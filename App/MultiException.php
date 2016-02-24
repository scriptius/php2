<?php

namespace App;

class MultiException extends \Exception implements \ArrayAccess, \Iterator {

    use TCollection;

    public function inLog() {
        foreach ($this->data as $key => $Obj) {
            var_dump($Obj);
            $log = new \App\Logger($Obj->getMessage(), $Obj->getFile(), $Obj->getLine());
        }
    }

}
