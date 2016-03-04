<?php

namespace App\Controllers;

use App\ControllerFrontend;

class News extends ControllerFrontend
{

    protected function beforeAction()
    {

    }

    protected function actionIndex()
    {
        $this->view->title = 'Мой крутой сайт!';
        $this->view->news = \App\Models\News::findAll();
        $this->view->display(__DIR__ . '/../templates/index.php');
    }

    protected function actionOne()
    {
        $id = (int)$_GET['id'];
        if (false == $this->view->article = \App\Models\News::findById($id)) {
            throw new \App\Exceptions\Error404('Запись с таким id не найдена', 404);
        }
        $this->view->display(__DIR__ . '/../templates/one.php');
    }
}
