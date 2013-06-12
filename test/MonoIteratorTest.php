<?php

require_once 'class/MonoCollection.php';
require_once 'class/Mono.php';

$MC = new MonoCollection;

$mono1 = new Mono;
$mono2 = new Mono;

$mono1->setHello('world');
$mono2->setHoge('Fuga');

$MC->appendMono($mono1);
$MC->appendMono($mono2);

$it = $MC->getIterator();

foreach($it as $key => $value){
    print_r($key);
    echo "\n";
    print_r($value);
    echo "\n";
}

?>
