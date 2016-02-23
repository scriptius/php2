<?php

namespace App\Controllers;

use App\View;
use App\ControllerBackend;
use App\Models\News;
use App\Models\Author;
use \App\MultiException;

class Admin extends ControllerBackend {

    protected function actionIndex() {

        $this->view->title = 'Админ-панель!';
        $this->view->news = \App\Models\News::findAll();
        $this->view->display(__DIR__ . '/../templates/admin/index.php');
    }

    protected function beforeAction() {
        
    }

    protected function actionEdit() {
        $id = (int) $_GET['id'];
        $forConvertObjToArray = News::findById($id);
        foreach ($forConvertObjToArray as $key => $value) {
            $array[$key] = $forConvertObjToArray->$key;
        }
        $this->view->dataForFields = $array;
        $this->view->authors = Author::findAll();
        $this->view->display($_SERVER['DOCUMENT_ROOT'] . '\App\templates\admin\edit.php');
    }

    protected function actionCreate() {
        $this->view->authors = Author::findAll();
        $this->view->display($_SERVER['DOCUMENT_ROOT'] . '\App\templates\admin\create.php');
    }

    public function actionSave() {
        $article = new News();
        try {
            $article->fill($_POST)->save();
            $this->redirect('http://scriptius/App/Controllers/Admin/Index', 'Данные успешно сохранены!');
        } catch (MultiException $e) {
            $this->view->errors = $e;
            $this->view->dataForFields = $_POST;
            $this->view->authors = Author::findAll();
            if (!empty($_POST['id'])) {
                $this->view->display('App\templates\Admin\edit.php');
            } else {
                $this->view->display('App\templates\Admin\create.php');
            }
        }
    }

    public function actionDel() {
        if (!empty($_GET['id'])) {
            $deleteNews = News::findById((int) $_GET['id']);

            if ($deleteNews->delete()) {

                $this->redirect('http://scriptius/App/Controllers/Admin/Index', 'Данные успешно удалены!');
            } else {
                $this->redirect('http://scriptius/App/Controllers/Admin/Index', 'Что-то пошло не так и удалить запись не получилось. Попробуйте еще раз!');
            }
        }
    }

}
