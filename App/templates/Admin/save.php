<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '\autoload.php';
if(empty($_POST['id'])){
    $forSave = new App\Models\News();
    }else{
    $forSave = App\Models\News::findById((int) $_POST['id']);
    }
    
//if (isset($_POST['id']) and ( $_POST['id']) != '') :    //проверяем, что данные из edit.php пришли для редактирования новости
//    $forSave = App\Models\News::findById((int) $_POST['id']);
//elseif (isset($_POST['id'])):                           //проверяем, что данные из edit.php пришли для добавления нововости
//    $forSave = new App\Models\News();
//else:                                                   //Это на случай, если пользователь перешел на страницу не с edit.php(например просто набрав в адресной строке)
//    $_SESSION['redirectMessage'] = 'Данные не были отправлены с формы редактирования! Попробуйте отправить снова.';
//    header("Location: http://scriptius/app/admin/list.php");
//    exit;
// endif;
$forSave->title = (string) $_POST['title'];
$forSave->text = (string) $_POST['text'];
$forSave->date = (string) $_POST['date'];

$_SESSION['redirectMessage'] = ($forSave->save())? 'Данные успешно сохранены': 'Данные сохранить не удалось';
header("Location: http://scriptius/app/admin/list.php");

