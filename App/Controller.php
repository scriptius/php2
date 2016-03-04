<?php
namespace App;


abstract class Controller
{
    public function action($action)
    {
        $methodName = 'action' . $action;
        $this->beforeAction();
        return $this->$methodName();
    }
}

