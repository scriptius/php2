<?php

namespace App;

class Loader {

    public static function start($nameCtrl, $action) {

        $controller = new $nameCtrl();
        if (!method_exists($controller, 'action' . $action)) {
            throw new \App\Exceptions\Error404('К сожалению, данное действие не может быть выполнено  ',
                    'Не найден экшн - action'.$action.' в контроллере - '.$nameCtrl,
                    __FILE__,
                    __METHOD__);
        }$controller->action($action);
    }

}
