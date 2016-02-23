<?php

namespace App\Exceptions;

class Db extends \Exception {

    public $exeption;
    public $messageForUsers;
    public $view;

    public function __construct($messageForUsers) {
//        foreach ($param as $key => $value) {
//            if (property_exists($this, $key)) {
//                $this->$key = $value;
//            }
//        }
        $this->view = new \App\View();
        $this->messageForUsers = $messageForUsers;
    }

    public function connect(\PDOException $e) {
        $log = new \App\Logger($e->getMessage(), $e->getFile(), $e->getLine());
        throw $this;
    }

    public function request($message, $file, $func) {
        $log = new \App\Logger($message, $file, $func);
        throw $this;
    }

}
