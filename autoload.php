<?php

/**
 * App\Models\User => ./App/Models/User.php
 */
function __autoload($class) {
if(!file_exists(__DIR__ . '/' . str_replace('\\', '/', $class) . '.php')){
//    throw new \App\Exceptions\Error404('К сожалению, страница отсутствует  ', __DIR__ . '/' . str_replace('\\', '/', $class) . '.php');
    return false;
}
    require __DIR__ . '/' . str_replace('\\', '/', $class) . '.php';
}
