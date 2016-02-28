<?php

namespace App;

class Config {

    use Singleton;

    public $data = [];

    protected function __construct() {
        $this->data = ['db' => [
                'host' => '127.0.0.1',
                'dbname' => 'php2',
                'login' => 'root',
                'pass' => ''
            ],
            'emailAdmin' => [
                'login' => 'levik04122008',
                'pass' => '%Ufkbyf201110%'
            ]
        ];
    }

}

//return [
//    'db' => [
//        'host' => 'localhost',
//        'dbname' => 'php2',
//        'login' => 'root',
//        'pass' => ''
//    ],
//];




//namespace App;
////**
//
//class Config {
//
//    use Singleton;
//
//    public $data = [];
//
//    protected function __construct() {
//   
//    }
//
//    protected function data() {
//        $this->data = parse_ini_file('config.ini',TRUE);
//        
//    }
//
//   
//
//}
