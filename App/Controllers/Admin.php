<?php

namespace App\Controllers;

use App\View;
use App\Controller;
use App\Models\News;

class Admin extends Controller {

    protected $view;

    public function __construct() {
        $this->view = new View();
    }

    protected function actionIndex() {
        $this->view->title = 'Админ-панель!';
        $this->view->news = \App\Models\News::findAll();
        $this->view->display(__DIR__ . '/../templates/admin/index.php');
    }

    protected function beforeAction() {
        
    }

    public function actionEdit() {

        $id = (int) $_GET['id'];
        var_dump($this->view->forEdit);
        $this->view->forEdit = (!empty($id)) ? News::findById($id) : NULL;
        $this->view->display(__DIR__ . '/../templates/admin/edit.php');
    }

    public function actionSave() {
        var_dump($_POST);
        $forSave = new News();
//        if(!empty($_POST['id'])){
//            echo 'dvbfb';
        $forSave->id = $_POST['id'];
        $forSave->author_id = $_POST['author_id'];
        $forSave->title = $_POST['title'];
        $forSave->text = $_POST['text'];
        $forSave->date = $_POST['date'];
        var_dump($forSave->id);
        $forSave->update();
//        }
        $_SESSION['redirectMessage'] = ($forSave->save()) ? 'Данные успешно сохранены' : 'Данные сохранить не удалось';
        header("Location: http://scriptius/index.php?ctrl=Admin&act=Index");
    }

    public function actionDel() {
        if (!empty($_GET['id'])) {
            $deleteNews = News::findById((int) $_GET['id']);
            $_SESSION['redirectMessage'] = ( $deleteNews->delete()) ? 'Данные успешно удалены' : 'Данные удалить не получилось';
            header("Location: http://scriptius/index.php?ctrl=Admin&act=Index");
        }
    }
}
    