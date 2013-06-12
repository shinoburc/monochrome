<?php

/* $Id: MonoIterator.php 144 2006-02-12 12:40:36Z shinobu $ */

class MonoIterator implements Iterator{
    private $mono_collection;
    private $index = 0;

    public function __construct(MonoCollection $mono_collection){
        $this->mono_collection = $mono_collection;
    }

    public function rewind(){
        $this->index = 0;
    }

    public function key(){
        return $this->index;
    }

    public function current(){
        return $this->mono_collection->getMonoAt($this->index);
    }
    
    function next(){
        $this->index++;
    }
    
    public function valid(){
        if ($this->index < $this->mono_collection->getLength()) {
            return true;
        }else{
            return false;
        }
    }
}

?>
