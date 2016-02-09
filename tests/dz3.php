<?php
require __DIR__ . '\..\autoload.php';
//Задание 1 - Реализовал метод __isset
//$view = new \App\View();
//
//var_dump($view->test);
//if (isset($view->test)) {
//    var_dump($view->test);
//} 
//
//var_dump($view->test);

//Задание 2
//$news= App\Models\News::findById(3);
//echo $news->author_id;
//$news->author;
$author = App\Models\Author::findById(1);
var_dump($author);