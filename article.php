<?php
require __DIR__ . '/autoload.php';

if (isset($_GET['id']) AND !empty($_GET['id'])){
$singleNews =  \App\models\news::findById($_GET['id']);

}else{
    echo 'Неверная страница';
}

include 'app/view/singleNews.php';