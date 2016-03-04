<?php
/**
 * Created by PhpStorm.
 * User: v.mamonov
 * Date: 25.02.2016
 * Time: 11:26
 */

namespace App\Controllers;

/**
 * list error codes
 * 100 - connect with DB
 * 101 - error request
 * 102 errors type Multiexceptions
 */

use App\View;
use App\Models\Author;

class Error
{
    protected $view;

    public function __construct()
    {
        $this->view = new \App\View();
    }

    function error100(\App\Exceptions\Db $e)
    {    //    100 - error connect with DB
        $this->view->messageForUsers = 'Уважаемый пользователь, связь с базой потерялась';
        $this->view->display($_SERVER['DOCUMENT_ROOT'] . '/App/templates/DatabaseError.php');
        \App\MailForLog::Send($e->getMessage(), 'Связь с БД потеряна');
        $log = new \App\Logger($e->getMessage(), $e->getFile(), $e->getLine(), 'Трассировка: ' . $e->getTraceAsString());
    }

    public function error101(\App\Exceptions\Db $e)
    { //     101 - error request to DB
        $this->view->messageForUsers = 'Уважаемый пользователь, возникла ошибка и ваше последнее действие не было выполнено';
        $this->view->display($_SERVER['DOCUMENT_ROOT'] . '/App/templates/DatabaseError.php');
        $log = new \App\Logger($e->getMessage(), $e->getFile(), $e->getLine(), 'Трассировка: ' . $e->getTraceAsString() . 'Запрос: ' . $e->getSqlAndParamsFromTrace());
    }

    public function error404(\App\Exceptions\Error404 $e)
    {
        $this->view->messageForUsers = 'Уважаемый пользователь, к сожалению, то, что Вы искали пока отсутствует в БД';
        $this->view->display($_SERVER['DOCUMENT_ROOT'] . '\App\templates\Error404.php');
        $log = new \App\Logger($e->getMessage(), $e->getFile(), $e->getLine(), 'Трассировка: ' . $e->getTraceAsString() . 'Запрос: ' . $e->getSqlAndParamsFromTrace());

    }

    public function error102(\App\MultiException $e)
    {
        $this->view->dataForFields = $e->getDataForEditingFromPost();
        $this->view->errors = $e;
        $this->view->authors = Author::findAll();

        if (!empty($e->getDataForEditingFromPost()['id'])) {
            $this->view->display($_SERVER['DOCUMENT_ROOT'] . '\App\templates\admin\edit.php');
        } else {
            $this->view->display('App\templates\Admin\create.php');
        }
        $log = new \App\Logger($e->getMessage(), $e->getFile(), $e->getLine(), 'Трассировка: ' . $e->getTraceAsString() . 'Сообщения Мультиисключения: ' . $e->getMessagesFromMultiexceptionToString());
    }
}