<?php

/* $Id: download.php 144 2006-02-12 12:40:36Z shinobu $ */

ini_set('include_path',ini_get('include_path') . ':./lib');
/* if use HTTP_Download or fopen and while(fread)...
ini_set('max_execution_time',60 * 5);
*/

require_once 'class/MonoSelect.php';

/* config */
require_once 'class/MonoConfig.php';

/* builder */
require_once 'class/MonoBuilder.php';

/* HTTP Query */
require_once 'class/HTTPQuery.php';

/* HTTP Download */
require_once 'HTTP/Download.php';
require_once 'HTTP/Download/PgLOB.php';

$http_query = new HTTPQuery();
$key = $http_query->getSafeGet('contents');
$id = $http_query->getSafeGet('id');
$name = $http_query->getSafeGet('name');

$contents_config = MonoConfig::getConfig('config/contents.ini');
$mono_select = new MonoSelect(MonoBuilder::genIteratorUsingConfig($contents_config,$key));
$it = $mono_select->execute($key,$id)->getIterator();

$connect = $mono_select->getConnect();

$oid = $it[0]->{'get' . $name}()->getoid();
$value = $it[0]->{'get' . $name}()->getvalue();
$file_type = $it[0]->{'get' . $name}()->getfile_type();
$file_size = $it[0]->{'get' . $name}()->getfile_size();
$file_name = $it[0]->{'get' . $name}()->getfile_name();

$mono_config = MonoConfig::getConfig('config/mono.ini');
$upload_tmp_dir = $mono_config->get_value('Monochrome','upload_tmp_dir');


$dir = $upload_tmp_dir . '/upload_file_' . md5($name . $value);
$file = $dir . '/' . $file_name;
if(!file_exists($dir)){
    mkdir($dir);
    pg_query($connect,"begin");
    $lo_export = pg_lo_export ($oid,$file);
    pg_query($connect,"commit");
}

if(file_exists($file)){
    header("Location: $file");
} else {
    header("Location: index.php");
}
exit();

/* use fopen and while(fread) */

$file = md5($name . $value);
$ext_pos = strrpos($file_name,".");
$file_ext = substr($file_name,$ext_pos+1,strlen($file_name)-$ext_pos);
$path = $upload_tmp_dir . '/' . $file . '.' . $file_ext;
if(!file_exists($path)){
    pg_query($connect,"begin");
    $lo_export = pg_lo_export ($oid,$path);
    pg_query($connect,"commit");
}
while( @ob_end_flush( ) ){ }
header( "Cache-Control: must-revalidate, post-check=0, pre-check=0" );
header( "Content-Type: application/octet-stream" );
header( "Content-Length: ". $file_size );
header( "Content-Disposition: attachment; filename=".$file_name);
$fp = fopen( $path , "r" );
while( !feof( $fp ) ){
    echo fread($fp, 4096);
}
fclose( $fp );

exit();
/* use HTTP_Download */

/* HTTP_Download buggy? */
$http_download =& new HTTP_Download();

$mono_config = MonoConfig::getConfig('config/mono.ini');
$upload_tmp_dir = $mono_config->get_value('Monochrome','upload_tmp_dir');

$file = md5($name . $value);
$ext_pos = strrpos($file_name,".");
$file_ext = substr($file_name,$ext_pos+1,strlen($file_name)-$ext_pos);
$path = $upload_tmp_dir . '/' . $file . '.' . $file_ext;
if(!file_exists($path)){
    pg_query($connect,"begin");
    $lo_export = pg_lo_export ($oid,$path);
    pg_query($connect,"commit");
}
//$http_download->setFile($path);
/* HTTP_Download_PgLOB buggy? */
$http_download->setResource(HTTP_Download_PgLOB::open($connect, $oid));

$http_download->setContentType($file_type);
$http_download->setContentDisposition(HTTP_DOWNLOAD_ATTACHMENT, $file_name);

if($file_size < 2097152){
    $http_download->setBufferSize(1024 * 8);
}

$http_download->send();

?>
