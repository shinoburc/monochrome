<?php

/* $Id: StatementBuilder.php 144 2006-02-12 12:40:36Z shinobu $ */

class StatementBuilder{
    public static function genPrimary_keyInsert($value){ 
        return 'insert into mono values(\'' . $value . '\');';
    }

    public static function genIntInsert($name,$value){
        $id = uniqid();
        return 'insert into int_associations values(\'' . $id . '\',\'' . $name . '\',' . $value . ');';
    }

    public static function genFloatInsert($value){
        $id = uniqid();
        return 'insert into float_associations values(\'' . $id . '\',\'' . $name . '\',' . $value . ');';
    }

    public static function genTimestampInsert($value){
        $id = uniqid();
        return 'insert into timestamp_associations values(\'' . $id . '\',\'' . $name . '\',\'' . $value . '\');';
    }

    public static function genClobInsert($value){
        /* TODO */
        return; 
    }

    public static function genBlobInsert($value){
        /* TODO */
        return
    }

    public static function genAliasInsert($value){
        $id = uniqid();
        return 'insert into timestamp_associations values(\'' . $id . '\',\'' . $name . '\',\'' . $value . '\');';
    }

    public static function genTextInsert($value){
        $id = uniqid();
        return 'insert into timestamp_associations values(\'' . $id . '\',\'' . $name . '\',\'' . $value . '\');';
    }
}

?>
