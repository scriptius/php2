<?php

namespace App\Exceptions;

class Error404 extends \PDOException {

    public $view;

    public function __construct($messageForUsers, $message, $file, $line, $notice= 'Отсутствует') {
        $this->view = new \App\View();
        $this->messageForUsers = $messageForUsers;
        $log = new \App\Logger($message, $file, $line, $notice);
//        $log = new \App\Logger('Ресурс не найден',$resourse);


        throw $this;
    }

}
