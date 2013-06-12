<?php

/* $Id$ */

class MonoController{
    private $mono_config;
    private $contents_config;
    private $http_query;
    private $contents;

    /**
     * initialize configs,http query and monochrome action
     *
     * @return  $action action
     */
    public function init(){
        $this->mono_config = MonoConfig::getConfig('config/mono.ini');
        $this->contents_config = MonoConfig::getConfig('config/contents.ini');
        $this->http_query = new HTTPQuery();
        $this->contents = $this->http_query->getSafeGet('contents');
        if(empty($this->contents)){
                $this->contents = $this->contents_config->get_value('default','contents'); 
        }
        $action = $this->http_query->getSafeGet('action');
        if(empty($action)){
            $action = $this->contents_config->get_value('default','action'); 
        }
        return $action;
    }
    
    /**
     * model
     *
     * @param   $action action
     * @return  $action action
     */
    public function model($action){
        $read_only = $this->contents_config->get_value($this->contents . '_element','read_only');
        /* before model action */
        switch($action){
            case 'MonoUpdate' :
                if($read_only == 'true'){
                    $action = $this->contents_config->get_value('default','action');
                    return $action;
                }
                require_once 'class/' . $action . '.php';
                $id = $this->http_query->getSafePost('id');
                $model = new $action(MonoBuilder::genIteratorUsingConfigAndHttpQuery($this->contents_config,$this->contents,$this->http_query));
                $model->execute($this->contents,$id);
                $action = $this->contents_config->get_value('default','action'); 
                break;
            case 'MonoInsert' :
            case 'MonoDelete' :
                if($read_only == 'true'){
                    $action = $this->contents_config->get_value('default','action');
                    return $action;
                }
                require_once 'class/' . $action . '.php';
                $model = new $action(MonoBuilder::genIteratorUsingConfigAndHttpQuery($this->contents_config,$this->contents,$this->http_query));
                $model->execute($this->contents,null);
                $action = $this->contents_config->get_value('default','action'); 
                break;
            default :
                break;
        }
        return $action;
    }

    /**
     * view
     * display monochrome contetnt
     *
     * @param   $action action
     * @return  void
     */
    public function view($action){
        require_once 'view/' . $action . '.php';
        require_once 'class/MonoSelect.php';

        /* view */
        switch($action){
            case 'MonoList' :
                $mono_select = new MonoSelect(MonoBuilder::genIteratorUsingConfig($this->contents_config,$this->contents));
                $view = new $action($mono_select->execute($this->contents,null)->getIterator());
                break;
            case 'MonoDetail' :
            case 'MonoModify' :
                $id = $this->http_query->getSafeGet('id');
                $mono_select = new MonoSelect(MonoBuilder::genIteratorUsingConfig($this->contents_config,$this->contents));
                $view = new $action($mono_select->execute($this->contents,$id)->getIterator());
                break;
            case 'MonoRegister' :
                $view = new $action(MonoBuilder::genIteratorUsingConfig($this->contents_config,$this->contents));
                break;
            default :
                exit();
        }
        $view->display($this->contents);
    }
}

?>
