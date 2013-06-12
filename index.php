<?php

/* $Id: index.php 145 2006-02-12 12:41:29Z shinobu $ */

ini_set('include_path',ini_get('include_path') . ':./lib');
require_once 'class/MonoController.php';
require_once 'class/MonoConfig.php';
require_once 'class/MonoBuilder.php';
require_once 'class/HTTPQuery.php';

$controller = new MonoController();
$controller->view($controller->model($controller->init()));

?>
