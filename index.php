<?php

require __DIR__ . '/autoload.php';

$a = 'ab';
$b = 'b';
echo $a <=> $b;
die;


$pathDefault = ($_SERVER['REQUEST_URI'] != '/') ? $_SERVER['REQUEST_URI'] : '/App/Controllers/News/Index';
$path = explode('/', parse_url($pathDefault, PHP_URL_PATH));
$action = array_pop($path);
array_shift($path);
$nameCtrl = implode('\\', $path);

try {
    App\Loader::start($nameCtrl, $action);
} catch (\App\Exceptions\Db $e) {
    $error = new \App\Controllers\Error();
    $actionName = 'error' . $e->getCode();
    $error->$actionName($e);

} catch (App\Exceptions\Error404 $e) {
    $error = new \App\Controllers\Error();
    $actionName = 'error' . $e->getCode();
    $error->$actionName($e);
}

