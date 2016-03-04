<?php

namespace App;

class Loader
{

    public static function start($nameCtrl, $action)
    {

        $controller = new $nameCtrl();
        if (!method_exists($controller, 'action' . $action)) {
            throw new \App\Exceptions\Error404('Не найден экшн - action' . $action . ' в контроллере - ' . $nameCtrl, 404);
        }
        $controller->action($action);
    }

}
