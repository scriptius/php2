<?php
session_start();

require_once $_SERVER['DOCUMENT_ROOT'] . '\autoload.php';

if (isset($_GET['id'])) {  //проверяем, что данные из пришли edit.php
    $deleteNews = App\Models\News::findById((int)$_GET['id']);
    $_SESSION['redirectMessage'] = ( $deleteNews->delete())? 'Данные успешно удалены': 'Данные удалить не получилось';
    header("Location: http://scriptius/app/admin/list.php");
}else{  //Это на случай, если пользователь перешел на страницу не с edit.php(например просто набрав в адресной строке)
    $_SESSION['redirectMessage'] = 'Нарушение безопасности использования сайте. Попробуйте удалить запись через админ-панель';
    header("Location: http://scriptius/app/admin/list.php");
}