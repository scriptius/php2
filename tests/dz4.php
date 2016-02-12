<?php
require __DIR__ . '\..\autoload.php';
$admin= new App\Controllers\Admin();
var_dump($admin);
$admin->actionIndex();

