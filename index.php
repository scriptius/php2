<?php

require __DIR__ . '/autoload.php';
/*
  $url = $_SERVER['REQUEST_URI'];
  $controller = new \App\Controllers\News();
  $action = $_GET['action'] ?: 'Index';
  $controller->action($action);
 * */


$action = $_GET['act'] ? : 'Index';

$nameCtrl = '\App\Controllers\\';
$nameCtrl .= (string) $_GET['ctrl'] ? : 'News';

$controller = new $nameCtrl;


$controller->action($action);

