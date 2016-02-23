<?php

namespace App;
//**

class Config {

    use Singleton;

    public $data;

    protected function __construct() {
        $this->data = parse_ini_file('config.ini',TRUE);
        
    }

   

}
