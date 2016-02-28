<?php

/**
 * App\Models\User => ./App/Models/User.php
 */
function my_autoload($class) 
{
    if (!file_exists(__DIR__ . '/' . str_replace('\\', '/', $class) . '.php')) {
        return false;
    }
    require __DIR__ . '/' . str_replace('\\', '/', $class) . '.php';
}

spl_autoload_register('my_autoload');
include '/vendor/autoload.php';
