<?php



$view = new \App\View();
$view['news']= App\Models\News::findAll();
$view['title'] = 'Список новостей';


$view->display($_SERVER['document_root'] . '/App/templates/listNews.php');
