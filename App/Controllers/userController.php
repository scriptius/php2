<?php
$view = new \App\View();
$view['users']= App\Models\User::findAll();
$view['title'] = 'Список пользователей';


$view->display($_SERVER['document_root'] . '/App/templates/listUsers.php');
