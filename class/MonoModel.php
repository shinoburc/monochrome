<?php

/* $Id$ */

abstract class MonoModel{
    protected $mono_iterator;
    protected $stmts = array();
    protected $stmts_blob_info = array();
    protected $connect;
    protected $options = array();

    public function __construct($mono_iterator = array()){
        $this->mono_iterator = $mono_iterator;
    }

    public function getConnect(){
        return $this->connect;
    }
    
    public function execute($key,$id){
        $this->genConnection();
        $this->genStmts($key,$id);
        /* TODO : intersept,petty tricks */
        return $this->executeStmts($key,$id);
    }

    public function genConnection(){
        $mono_config = MonoConfig::getConfig('config/mono.ini');
        $this->connect = pg_connect(
                                    " port=" . $mono_config->get_value('DB','db_port')
                                  . " dbname=" . $mono_config->get_value('DB','db_name')
                                  . " user=" . $mono_config->get_value('DB','db_user')
                                );
    }

    abstract protected function genStmts($key,$id);
    abstract protected function executeStmts($key,$id);
}

?>
