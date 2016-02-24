<?php

require __DIR__ . '/autoload.php';

$pathDefault = ($_SERVER['REQUEST_URI'] != '/') ? $_SERVER['REQUEST_URI'] : '/App/Controllers/News/Index';
$path = explode('/', parse_url($pathDefault, PHP_URL_PATH));
$action = array_pop($path);
array_shift($path);
$nameCtrl = implode('\\', $path);

try {
    App\Loader::start($nameCtrl, $action);
} catch (\App\Exceptions\Db $e) {
    $e->view->errors = $e->messageForUsers;
    $e->view->display('App\templates\DatabaseError.php');
} catch (App\Exceptions\Error404 $e) {
    $e->view->errors = $e->messageForUsers;
    $e->view->display('App\templates\Error404.php');
}

