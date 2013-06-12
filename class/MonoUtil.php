<?php

/* $Id$ */

class MonoUtil{
    public function int2byte($int){
        if(!is_numeric($int)){
            return $int;
        }
        if($int < 1024){
            return $int . 'Byte';
        } else if ($int < 1024 * 1024){
            return round($int/1024,2) . 'KByte';
        } else if ($int < 1024 * 1024 * 1024){
            return round($int/(1024 * 1024),2) . 'MByte';
        } else if ($int < 1024 * 1024 * 1024 * 1024){
            return round($int/(1024 * 1024 * 1024),2) . 'GByte';
        } else {
            return round($int/(1024 * 1024 * 1024),2) . 'GByte';
        }
    }

    public function genEngine(){
        if(stristr($_SERVER['HTTP_USER_AGENT'],'safari')){
            return 'khtml';
        } else if(stristr($_SERVER['HTTP_USER_AGENT'],'firefox')){
            return 'gecko';
        } else if(stristr($_SERVER['HTTP_USER_AGENT'],'w3m')){
            return 'w3m';
        } else {
            return 'gecko';
        }
    }

    public function genTemporaryFileName($path='tmp',$ext=null){
        return $path . '/' . uniqid() . $ext;
    }
}

?>
