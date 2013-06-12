<?php

/* $Id: MonoUpdate.php 149 2006-02-12 14:46:07Z shinobu $ */

require_once 'class/MonoModel.php';
require_once 'class/MonoDelete.php';
require_once 'class/MonoInsert.php';

class MonoUpdate extends MonoModel{
    private $delte;
    private $insert;

    public function execute($key,$id){
        $this->delete = new MonoDelete($this->mono_iterator);
        $this->insert = new MonoInsert($this->mono_iterator);

        $this->delete->genConnection();
        $this->insert->genConnection();

        $this->genStmts($key,$id);
        $this->executeStmts($key,$id);
    }

    public function genStmts($key,$id){
        $this->delete->genStmts($key,$id);
        $this->insert->genStmts($key,$id);
    }

    public function executeStmts($key,$id){
        $this->delete->executeStmts($key,$id);
        $this->insert->executeStmts($key,$id);
    }
}

?>
