<?php

/* $Id: MonoBuilder.php 144 2006-02-12 12:40:36Z shinobu $ */

require_once 'class/MonoCollection.php';
require_once 'class/Mono.php';
require_once 'class/MonoUtil.php';

class MonoBuilder{

    public function genMonoUsingConfig($config,$key,$options = array()){
        $item = $config->get_value($key . '_element');
        $mono = new Mono();
        $kinds = $config->get_value('element_attributes');
        $mono->setContents($key);
        $skip_kinds = array();

        /* sort and limit offset */
        if(empty($options)){
            /* FIXME : duplicate new in MonoController */
            $http_query = new HTTPQuery();
            $sfd    = $http_query->getSafeGet('sfd');
            $sod    = $http_query->getSafeGet('sod');
            $limit  = $http_query->getSafeGet('limit');
            $offset = $http_query->getSafeGet('offset');
        } else {
            if(isset($options['sfd'])){
                $sfd = $options['sfd'];
            } else {
                $sfd = null;
            }
            if(isset($options['sod'])){
                $sod = $options['sod'];
            } else {
                $sod = null;
            }
            if(isset($options['limit'])){
                $limit = $options['limit'];
            } else {
                $limit = null;
            }
            if(isset($options['offset'])){
                $offset = $options['offset'];
            } else {
                $offset = null;
            }
        }

        if(empty($limit)){
            $limit = $config->get_value($key . '_element','list_limit');
        }

        $mono->setOption('sfd',$sfd);
        $mono->setOption('sod',$sod);
        $mono->setOption('limit',$limit);
        $mono->setOption('offset',$offset);

        if(!empty($sfd)){
            $skip_kinds['sort'] = true;
            $skip_kinds['order'] = true;
        }

        if(isset($item['elements'])){
            foreach(explode(',',$item['elements']) as $element){
                $mono_element = new Mono();
                /* sort field */
                if($element == $sfd){
                    $mono_element->sort = 'true';
                    $mono_element->order = $sod;
                }
                foreach($kinds as $kind){
                    if(isset($skip_kinds[$kind])){
                        continue;
                    }
                    if(isset($item[$element . '.' . $kind])){
                        $mono_element->$kind = $item[$element . '.' . $kind];
                    } else {
                        $mono_element->$kind = null;
                    }
                }
                $mono->$element = $mono_element;
            }
        }
        return $mono;
    }

    public static function genCollectionUsingConfig($config,$key,$options = array()){
        $mono = self::genMonoUsingConfig($config,$key,$options);
        $mono_collection = new MonoCollection();
        $mono_collection->appendMono($mono);
        return $mono_collection;
    }

    public static function genIteratorUsingConfig($config,$key,$options = array()){
        return self::genCollectionUsingConfig($config,$key,$options)->getIterator();
    }

    public function genMonoUsingConfigAndHttpQuery($config,$key,$http_query){
        $item = $config->get_value($key . '_element');
        $mono = new Mono();
        $kinds = $config->get_value('element_attributes');

        $id = $http_query->getSafePost('id');
        if(empty($id)){
            $id = $http_query->getSafeGet('id');
        }

        $mono->setPrimaryKey($id);
        $mono->setContents($key);

        if(isset($item['elements'])){
            foreach(explode(',',$item['elements']) as $element){
                $mono_element = new Mono();
                foreach($kinds as $kind){
                    if($kind == "value"){
                        continue;
                    }

                    if($kind == "type"){
                        if(isset($item[$element . '.' . $kind])){
                            $mono_element->$kind = $item[$element . '.' . $kind];
                        } else {
                            $mono_element->$kind = null;
                        }
                        $mono_element->value = self::genValueUsingHttpQuery($mono_element->$kind,$element,$http_query);
                    } else {
                        if(isset($item[$element . '.' . $kind])){
                            $mono_element->$kind = $item[$element . '.' . $kind];
                        } else {
                            $mono_element->$kind = null;
                        }
                    }
                }
                $mono->$element = $mono_element;
            }
        }
        return $mono;
    }

    public static function genCollectionUsingConfigAndHttpQuery($config,$key,$http_query){
        $mono = self::genMonoUsingConfigAndHttpQuery($config,$key,$http_query);
        $mono_collection = new MonoCollection();
        $mono_collection->appendMono($mono);
        return $mono_collection;
    }

    public static function genIteratorUsingConfigAndHttpQuery($config,$key,$http_query){
        return self::genCollectionUsingConfigAndHttpQuery($config,$key,$http_query)->getIterator();
    }

    public static function genValueUsingHttpQuery($type,$name,$http_query){
        /* TODO : validation */
        switch($type){
            case 'timestamp' :
                return self::genTimestampUsingHttpQuery($name,$http_query);
                /* TODO */
                break;
            case 'rich_text' :
                $engine = MonoUtil::genEngine();
                if($engine == 'khtml' or $engine == 'gecko'){
                    return $http_query->getPost($name);
                } else {
                    //return $http_query->getSafePost($name);
                    return $http_query->getSafePost($name);
                }
                break;
            case 'primary_key' : 
            case 'int' :
            case 'float' :
            case 'clob' :
            case 'file' :
            case 'blob' :
            case 'alias' :
            case 'text' :
            default :
                return $http_query->getSafePost($name);
                break;
        }
    }
    
    public static function genTimestampUsingHttpQuery($name,$http_query){
        /* TODO : DB type switch */
        /* FIXME : use mktime more better? */
        switch($http_query->getSafePost($name)){
            case 'auto_insert' :
                return date('Y-m-d h:i:s');
                break;
            case 'auto_update' :
                return date('Y-m-d h:i:s');
                break;
            default :
                $format = "%4d-%02d-%02d %02d:%02d:%02d";
                return sprintf($format
                              ,$http_query->getSafePost($name . 'Year')
                              ,$http_query->getSafePost($name . 'Month')
                              ,$http_query->getSafePost($name . 'Day')
                              ,$http_query->getSafePost($name . 'Hour')
                              ,$http_query->getSafePost($name . 'Minute')
                              ,$http_query->getSafePost($name . 'Second'));
                break;
        }
    }
}

?>
