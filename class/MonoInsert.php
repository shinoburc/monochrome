<?php

/* $Id: MonoInsert.php 144 2006-02-12 12:40:36Z shinobu $ */

require_once 'class/MonoModel.php';

class MonoInsert extends MonoModel{
    public function genStmts($key,$id){
        foreach($this->mono_iterator as $mono){
            foreach($mono->getIterator() as $element_name => $element){
                switch($element->type){
                    case 'primary_key' : 
                        $name = $mono->getname()->getvalue();
                        $this->stmts[] = "insert into monos values('" . addslashes($mono->getPrimaryKey()) . "','" . addslashes($name) . "','" . addslashes($mono->getContents()) . "');";
                        break;
                    case 'int' :
                        $name = $element_name;
                        $insert_value = $element->getvalue();
                        if(empty($insert_value)){
                            continue;
                        }
                        $this->stmts[] = "insert into int_associations values('" . addslashes($mono->getPrimaryKey()) . "','" . addslashes($name) . "','" . addslashes($element->getvalue()) . "');";
                        break;
                    case 'float' :
                        $name = $element_name;
                        $insert_value = $element->getvalue();
                        if(empty($insert_value)){
                            continue;
                        }
                        $this->stmts[] = "insert into float_associations values('" . addslashes($mono->getPrimaryKey()) . "','" . addslashes($name) . "','" . addslashes($element->getvalue()) . "');";
                        break;
                    case 'timestamp' :
                        $name = $element_name;
                        $insert_value = $element->getvalue();
                        if(empty($insert_value)){
                            continue;
                        }
                        $this->stmts[] = "insert into timestamp_associations values('" . addslashes($mono->getPrimaryKey()) . "','" . addslashes($name) . "','" . addslashes($element->getvalue()) . "');";
                        break;
                    case 'clob' :
                        /* TODO */
                        break;
                    case 'file' :
                    case 'blob' :
                        $name = $element_name;
                        if(isset($_FILES[$element_name]['tmp_name'])){
                                $info = $_FILES[$element_name];
                                $info['stmt'] = "insert into file_associations values('" . addslashes($mono->getPrimaryKey()) . "','" . addslashes($name) . "','%s');";
                                $info['view_type'] = $element->getview_type();
                                $info['column_name'] = $name;
                                $info['id'] = $mono->getPrimaryKey();
                                $this->stmts_blob_info[] = $info;
                        } else {
                        }
                        break;
                    case 'alias' :
                        $name = $element_name;
                        $insert_value = $element->getvalue();
                        if(empty($insert_value)){
                            continue;
                        }
                        $this->stmts[] = "insert into alias_associations values('" . addslashes($mono->getPrimaryKey()) . "','" . addslashes($name) . "','" . addslashes($element->getvalue()) . "');";
                        break;
                    case 'rich_text' :
                    case 'text' :
                    default :
                        $name = $element_name;
                        $insert_value = $element->getvalue();
                        if(empty($insert_value)){
                            continue;
                        }
                        $this->stmts[] = "insert into text_associations values('" . addslashes($mono->getPrimaryKey()) . "','" . addslashes($name) . "','" . addslashes($element->getvalue()) . "');";
                        break;
                }
            }
        }

    }

    public function executeStmts($key,$id){
        pg_query($this->connect,"begin");
        foreach($this->stmts as $index => $value){
            $result = pg_exec($this->connect, $value);
        }
        foreach($this->stmts_blob_info as $lob_info){
            $oid = pg_lo_import($lob_info['tmp_name']);
            $file_info = $oid
            . '|DELIMITER|' . addslashes($lob_info['type'])
            . '|DELIMITER|' . addslashes($lob_info['size'])
            . '|DELIMITER|' . addslashes($lob_info['name']);
                                                                                     
            $stmt = sprintf($lob_info['stmt'],$file_info);
            $result = pg_query($this->connect, $stmt);
            switch($lob_info['view_type']){
                case 'attach' :
                    $mono_config = MonoConfig::getConfig('config/mono.ini');
                    $upload_tmp_dir = $mono_config->get_value('Monochrome','upload_tmp_dir');
                    $download_style = $mono_config->get_value('Monochrome','download_style');

                    switch($download_style){
                        case "direct" :
                            /* copy upload file */
                            $dir = $upload_tmp_dir . '/upload_file_' . md5($lob_info['id'] . $lob_info['column_name'] . $oid);
                            $file = $dir . '/' . $lob_info['name'];
                            if(!file_exists($dir)){
                                mkdir($dir);
                            }
                            if(!file_exists($file)){
                                copy($lob_info['tmp_name'],$file);
                            }
                            break;
                        case "redirect" :
                        case "http_download" :
                        case "fopen_and_fread" :
                        default :
                    }
                    break;
                case 'image' :
                default :
                    break;
            }
        }
        pg_query($this->connect, "commit");
    }
}

?>
