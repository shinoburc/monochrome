<?php

require_once 'class/MonoIterator.php';

$mono_array = new MonoIterator;
$mono_array->setaho('baka');

foreach($mono_array as $key => $value){
    print_r($key);
    print_r($value);
}

?>
