<?php

/* $Id: MonoDelete.php 144 2006-02-12 12:40:36Z shinobu $ */

require_once 'class/MonoModel.php';

class MonoDelete extends MonoModel{
    public function genStmts($key,$id){
        $mono_config = MonoConfig::getConfig('config/mono.ini');
        $tables = $mono_config->get_value('MonoTables');

        foreach($this->mono_iterator as $mono){
            $id = addslashes($mono->getPrimaryKey());
            foreach($tables as $table){
                $this->stmts[] = 'delete from ' . $table . " where id = '" . $id . "';";
            }
        }
    }

    public function executeStmts($key,$id){
        foreach($this->stmts as $index => $value){
            $result = pg_exec($this->connect, $value);
        }
    }
}

?>
