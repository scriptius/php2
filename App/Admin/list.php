<?php
session_start();
require $_SERVER['DOCUMENT_ROOT'] . '/autoload.php';
if($_SESSION['redirectMessage']){           //Здесь в случае перенаправления будет указан статус предыдущей операции
    echo $_SESSION['redirectMessage'];
    unset($_SESSION['redirectMessage']);
}
$allNews = App\Models\News::findAll();?>
<br><br><a href="http://scriptius/app/admin/edit.php">Добавить новость</a><br><br>
<?php
foreach ($allNews as $objNews) {
    echo mb_substr($objNews->title, 0, 50,'UTF-8').'...';
    ?> <a href="http://scriptius/app/admin/edit.php?id=<?= $objNews->id ?>">Редактировать</a>
    <a href="http://scriptius/app/admin/delete.php?id=<?= $objNews->id ?>">Удалить</a><br><br><?php }
    ?>



