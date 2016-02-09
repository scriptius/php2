<?php
require __DIR__ . '/autoload.php';

if ($_GET['mode']=='users'){

    include '/App/Controllers/userController.php';
}else{
    include '/App/Controllers/listController.php';
}
