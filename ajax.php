<?php

/* $Id: ajax.php 152 2006-02-14 14:43:53Z shinobu $ */

ini_set('include_path',ini_get('include_path') . ':./lib');

require_once 'HTML/AJAX/Server.php';

require_once 'class/MonoSelect.php';

require_once 'view/MonoDetail.php';
require_once 'view/MonoList.php';

/* config */
require_once 'class/MonoConfig.php';
/* builder */
require_once 'class/MonoBuilder.php';
/* HTTP Query */
require_once 'class/HTTPQuery.php';

$server = new HTML_AJAX_Server();
$server->registerClass(new ajax());
$server->handleRequest();

class ajax{
    public function genDetail($options = null){
        $options = get_object_vars($options);
        if(isset($options['key'])){
            $key = $options['key'];
            unset($options['key']);
        } else {
            $key = null;
        }
        if(isset($options['id'])){
            $id = $options['id'];
            unset($options['id']);
        } else {
            $id = null;
        }

        $contents_config = MonoConfig::getConfig('config/contents.ini');
        $mono_select = new MonoSelect(MonoBuilder::genIteratorUsingConfig($contents_config,$key,$options));
        $view = new MonoDetail($mono_select->execute($key,$id)->getIterator());
        return mb_convert_encoding($view->genContent($key,false,true),'UTF8');
    }

    public function genList($options = null){
        $options = get_object_vars($options);
        if(isset($options['key'])){
            $key = $options['key'];
            unset($options['key']);
        } else {
            $key = null;
        }
        $contents_config = MonoConfig::getConfig('config/contents.ini');
        $mono_select = new MonoSelect(MonoBuilder::genIteratorUsingConfig($contents_config,$key,$options));
        $view = new MonoList($mono_select->execute($key,false,true)->getIterator());
        return mb_convert_encoding($view->genContent($key,false,true),'UTF8');
    }
}

?>
