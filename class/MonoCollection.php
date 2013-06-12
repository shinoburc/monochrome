<?php

/* $Id: MonoCollection.php 144 2006-02-12 12:40:36Z shinobu $ */

require_once 'class/MonoIterator.php';

class MonoCollection{
    public $monos = array();

    public function __construct($monos = array()){
        $this->monos = $monos;
    }

    public function appendMono(Mono $mono){
        $this->monos[count($this->monos)] = $mono;
    }

    public function getLength(){
        return count($this->monos);
    }

    public function getMonoAt($index){
        return $this->monos[$index];
    }

    public function getIterator(){
        $arrayobject = new ArrayObject($this->monos);
        return $arrayobject->getIterator();
    }
}

?>
