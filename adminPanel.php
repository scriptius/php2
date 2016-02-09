<?php

require __DIR__ . '/autoload.php';
$allNews = App\Models\News::findAll();

var_dump($_POST);
var_dump($_GET);

if ($_POST['title'] && isset($_GET['title'])) {
    $addNews = new App\Models\News();
    $addNews->title = $_POST['title'];
    $addNews->text = $_POST['text'];
    $addNews->date = $_POST['date'];
    $addNews->save();
}
switch ($_GET['mode']) {
    case 'delete':
        $forDelete = App\Models\News::findById($_GET['id']);
        $forDelete->delete();
        break;
    case 'edit':
        $forEdit = App\Models\News::findById($_GET['id']);
        if ($_POST){
            $forEdit->title=$_POST['title'];
            $forEdit->text=$_POST['text'];
            $forEdit->date=$_POST['date'];
            $forEdit->save();
        }
//        var_dump($forEdit);
}

require_once 'App\view\defaultAdmin.php';
if ($_POST){unset($_POST);}
if ($_GET){unset($_GET);}

?>
