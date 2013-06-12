<?php

require_once 'class/Mono.php';

$mono = new Mono(array('hello' => 'world'));

$mono->sethello('hoge');

print_r($mono);

$mono->hello = 'fuga';

print_r($mono);

print_r($mono->gethello() . "\n"); 

print_r($mono->hello . "\n");

?>
