<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '\autoload.php';
if (isset($_GET['id'])){
    $article = App\Models\News::findById((int)$_GET['id']);
   }else{
    $article = new App\Models\News();
    }
include $_SERVER['DOCUMENT_ROOT'] . '\App\view\defaultAdmin.php';

?>
