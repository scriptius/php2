<?php

namespace App;

trait magicMethods
{
    public $data = [];

    public function __set($k, $v)
    {
        $this->data[$k] = $v;
    }

    /**
     * @param $k Имя недоступного свойства
     * @return mixed Значение ключа $k массива data
     */
    public function __get($k)
    {
        return $this->data[$k];
    }

    /**
     * @param $param Имя недоступного свойства
     * @return bool Если свойство  существует,  то - вернуть его
     */
    public function __isset($k)
    {


        return $this->data[$k] == true;

//        if(array_key_exists($k, $this->data)){
//            return $this->data[$k];
//                    }else{
//            return $this->data[$k] = NULL;
//        }


    }

}
