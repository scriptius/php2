<?php

namespace App;

session_start();

abstract class ControllerBackend {

    protected $view;

    public function __construct() {
        $this->view = new View();
    }

    public function action($action) {
        Authorization::logIn();
        if ('logOut' == $_GET['status'] and true == Authorization::logOut()) {
            $this->redirect('http://scriptius/App/Controllers/Admin/Index', 'Вы успешно вошли в систему!');
        }


        if (true == $_SESSION['access']) {
            $methodName = 'action' . $action;
            return $this->$methodName();
        } else {
            $this->view->message = 'Представьтесь, пожалуйста';
            $this->view->display('/templates/admin/authorization.php');
        }
    }

    public function redirect($url, $message) {
        $_SESSION['redirectMessage'] = $message;
        header('Location: ' . $url);
    }

}
