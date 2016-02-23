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
//$author = App\Models\Author::findById(1);
//var_dump($author);

//Задание 3 Использовано в App\templates\listNews.php

//Задание 4 Использовано в App\templates\listController.php
//$view = new \App\View();
//$view['news']= App\Models\News::findAll();
//$view['title'] = 'Список новостей';

$news = App\Models\News::findById(3);

$news->test= ' test message ';
var_dump($news);
//var_dump($news->test);
//var_dump($news->authors);


if (isset($news->author)) {
var_dump($news->author);
//    echo ' da';
}else{
//    echo ' net';
}
//var_dump($news->authors);
