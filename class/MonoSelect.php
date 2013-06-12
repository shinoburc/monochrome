<?php

/* $Id: MonoSelect.php 144 2006-02-12 12:40:36Z shinobu $ */

require_once 'class/MonoModel.php';
require_once 'class/MonoUtil.php';

class MonoSelect extends MonoModel{
    private $limit  = 0;
    private $offset = 0;

    public function genStmts($key,$id){
        $columns = array();
        $tables = array();
        $conditions = array();
        $joins = array();
        $sql = 'select ';
        foreach($this->mono_iterator as $mono){
            $contents_config = MonoConfig::getConfig('config/contents.ini');
            $order = array();


            /* fixme : list and detail switch must be IJYOU */
            if(empty($id)){
                $list_elements = explode(',',$contents_config->get_value($mono->getContents() . '_element','list_elements'));
            } else {
                $list_elements = explode(',',$contents_config->get_value($mono->getContents() . '_element','elements'));
            }

            $this->genOptionsStmts($key,$id,$mono);

            foreach($mono->getIterator() as $element_name => $element){
                if(!in_array($element_name,$list_elements)){
                    continue;
                }
                $table_name = $element->type . '_associations ';
                switch($element->type){
                    case 'primary_key' : 
                        $columns[] = 'monos.id as ' . $element_name;
                        $tables[] = 'monos';
                        $conditions[] = "monos.semantic = '" . $key . "'";
                        if(!empty($id)){
                            $conditions[] = "monos.id = '" . $id . "'";
                        }
                        $name = $mono->getname()->getvalue();
                        break;
                    case 'file' :
                    case 'blob' :
                        $table_name = 'file_associations';
                        $columns[] = $element_name . '.value as ' . $element_name;
                        $joins[] = ' left outer join ' . $table_name . ' ' . $element_name . ' on monos.id = ' . $element_name . '.id and ' . $element_name . ".name = '" . $element_name . "'";
                        $name = $element_name;
                        break;
                    case 'rich_text' :
                        $table_name = 'text_associations ';
                    case 'int' :
                    case 'float' :
                    case 'timestamp' :
                    case 'clob' :
                    case 'alias' :
                    case 'text' :
                    default :
                        $columns[] = $element_name . '.value as ' . $element_name;
                        $joins[] = ' left outer join ' . $table_name . $element_name . ' on monos.id = ' . $element_name . '.id and ' . $element_name . ".name = '" . $element_name . "'";
                        $name = $element_name;
                        break;
                }
                if($element->sort == "true"){
                    $this->options['sfd'] = $element_name;
                    $this->options['sod'] = $element->order;
                    $order[] = ' ' . $element_name . ' ' . $element->order;
                }
            }
            $stmt = 'select ' . implode(',',$columns) 
                   . ' from ' . implode(',',$tables) . ' ' . implode(' ',$joins) 
                   . ' where ' . implode(' and ',$conditions);
            if(!empty($order)){
                $stmt .= ' order by ' . implode(',',$order);
            }
            if(!empty($this->limit)){
                $stmt .= ' limit ' . $this->limit;
            }
            if(!empty($this->offset)){
                $stmt .= ' offset ' . $this->offset;
            }
            $this->stmts[] = $stmt;
        }

    }

    public function executeStmts($key,$id){
        $mono_config = MonoConfig::getConfig('config/mono.ini');
        $upload_tmp_dir = $mono_config->get_value('Monochrome','upload_tmp_dir');
        $download_style = $mono_config->get_value('Monochrome','download_style');

        $contents_config = MonoConfig::getConfig('config/contents.ini');
        $kinds = $contents_config->get_value('element_attributes');

        $option_results = array();

        /* sort */
        if(isset($this->options['sfd'])){
            $sfd = $this->options['sfd'];
        } else {
            $sfd = '';
        }
        if(isset($this->options['sod'])){
            $sod = $this->options['sod'];
        } else {
            $sod = '';
        }

        foreach($this->stmts as $index => $value){
            $result = pg_exec($this->connect, $value);
            $num = pg_numrows($result);

            if(!is_numeric($index)){
                for($i = 0; $i < $num;$i++){
                    $result = pg_fetch_assoc($result, $i);
                    $option_results[$index] = current($result);
                }
                continue;
            }

            $element_array = array();
            $mono_array = array();
            $monos_array = array();

            for($i = 0; $i < $num;$i++){
                $rec = pg_fetch_assoc($result, $i);

                foreach($rec as $rec_column => $rec_value){
                    $element_array = array();
                    if($rec_column == "id"){
                        $primary_key = $rec_value;
                    }
                    foreach($kinds as $kind){
                        if($kind == "value"){
                            $element_array[$kind] = $rec_value;
                        } else if($kind == "sort"){
                            if($rec_column == $sfd){
                                $element_array['sort'] = 'true';
                                $element_array['order'] = $sod;
                            } else {
                                $element_array['sort'] = '';
                                $element_array['order'] = '';
                            }
                        } else if($kind == "order"){
                            continue;
                        } else {
                            $element_array[$kind] = $contents_config->get_value($key . '_element',$rec_column . '.' . $kind);
                        }
                    }

                    /* for file operation */
                    if($element_array['type'] == 'blob' or $element_array['type'] == 'file'){
                        $file_info = explode('|DELIMITER|',$element_array['value']);

                        if(count($file_info) < 4 or empty($file_info[0])){
                            $element_array['path'] = '';
                        } else {
                            list($oid,$file_type,$file_size,$file_name) = $file_info;
                            $ext_pos = strrpos($file_name,".");
                            $file_ext = substr($file_name,$ext_pos+1,strlen($file_name)-$ext_pos);
                            $file = md5($element_array['name'] . $element_array['value']);

                            switch($element_array['view_type']){
                                case 'image' :
                                    $path = $upload_tmp_dir . '/' . $file . '.' . $file_ext;
                                    if(!file_exists($path)){
                                        /* export blob to file */
                                        pg_query($this->connect,"begin");
                                        $lo_export = pg_lo_export ($oid,$path);
                                        pg_query($this->connect,"commit");
                                    }
                                    break;
                                case 'attach' :
                                default :
                                    switch($download_style){
                                        case "direct" :
                                            $dir = $upload_tmp_dir . '/upload_file_' . md5($primary_key . $rec_column . $oid);
                                            $file = $dir . '/' . $file_name;
                                            if(!file_exists($dir)){
                                                mkdir($dir);
                                            }
                                            if(!file_exists($file)){
                                                pg_query($this->connect,"begin");
                                                $lo_export = pg_lo_export ($oid,$file);
                                                pg_query($this->connect,"commit");
                                            }
                                            $path = $file;
                                            break;
                                        case "redirect" :
                                        case "http_download" :
                                        case "fopen_and_fread" :
                                        default :
                                            $path = 'download.php?contents=' . $key . '&id=' . $id . '&name=' . $rec_column;
                                            break;
                                    }
                                    break;
                            }
                            $element_array['path'] = $path;
                            $element_array['oid'] = $oid;
                            $element_array['file_type'] = $file_type;
                            $element_array['file_ext']  = $file_ext;
                            $element_array['file_size'] = $file_size;
                            $element_array['file_size_view'] = MonoUtil::int2byte($file_size);
                            $element_array['file_name'] = $file_name;
                        }
                    } else if($element_array['type'] == 'rich_text'){
                        $path = MonoUtil::genTemporaryFileName('tmp/temporary_file','.html');
                        file_put_contents($path,$element_array['value']);
                        $element_array['path'] = $path;
                    }
                    $elements = new Mono();
                    $elements->setElements($element_array);
                    $mono_array[$rec_column] = $elements;
                }

                $mono = new Mono();
                $mono->setElements($mono_array);
                $mono->setContents($key);
                $mono->setPrimaryKey($primary_key);
                $mono->setOption('limit',$this->limit);
                $mono->setOption('offset',$this->offset);
                $mono->setOption('sfd',$sfd);
                $mono->setOption('sod',$sod);
                if(isset($option_results[$key . '_' . 'count'])){
                    $mono->setOption('count',$option_results[$key . '_' . 'count']);
                }
                $monos_array[] = $mono;
            }

            $monos = new Mono();
            $monos->setElements($monos_array);
        }
        return $monos;
    }

    private function genOptionsStmts($key,$id,$mono){
        $limit = $mono->getOption('limit');
        if($limit > 0){
            $this->limit = $limit;
            $this->stmts[$key . '_' . 'count'] = 'select count(*) from monos where semantic = \'' . $key . '\'';
        }

        $offset = $mono->getOption('offset');
        if($offset > 0){
            $this->offset = $offset;
        }
    }
}

?>
