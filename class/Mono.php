<?php

/* $Id: Mono.php 144 2006-02-12 12:40:36Z shinobu $ */

class Mono {
    private $elements = array();
    private $contents;
    private $primary_key;
    private $options = array();

    public function __construct($elements = array()){
        if(is_array($elements)){
            $this->elements = $elements;
        }
    }

    public function setElements($elements){
        $this->elements = $elements;
    }

    public function getElements($elements){
        return $this->elements;
    }

    public function setContents($contents){
        $this->contents = $contents;
    }

    public function getContents(){
        return $this->contents;
    }

    public function setPrimaryKey($primary_key){
        $this->primary_key = $primary_key;
    }

    public function getPrimaryKey(){
        return $this->primary_key;
    }

    public function setOption($option_name,$option_value){
        $this->options[$option_name] = $option_value;
    }

    public function getOption($option_name){
        if(isset($this->options[$option_name])){
            return $this->options[$option_name];
        }
        return null;
    }

    public function __call($method,$args){
        switch(substr($method,0,3)){
            case 'set' :
                $member = substr($method,3);
                $this->elements[$member] = $args[0];
                break;
            case 'get' :
                $member = substr($method,3);
                if(isset($this->elements[$member])){
                    return $this->elements[$member];
                }
                return null;
                break;
            default :
                return;
                break;
        }
    }

    public function __set($key,$value){
        $this->elements[$key] = $value;
    }

    public function __get($key){
        if(isset($this->elements[$key])){
            return $this->elements[$key];
        }
        return null;
    }

    public function getIterator(){
        $arrayobject = new ArrayObject($this->elements);
        return $arrayobject->getIterator();
    }
}

?>
