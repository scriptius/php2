<?php

namespace App;

use App\View;

class AdminDataTable 
{
    public $models = [];
    public $func = [];
    
    
    public function __construct(array $models,  array $func) 
    {
//        var_dump($func);
//        die;
         $this->models = $models;
         $this->func = $func;
    }
    
    public function render()
     {
        $result = [];
             foreach ($this->models as $i => $model) {
             foreach ($this->func as $func) {
                 $result[$i][] = $func($model);
                 var_dump($model);
             }
         }
$view = new View();
$view->news = $result;
$view->display(__DIR__ . '/templates/admin/adminDataTable.php');

//         var_dump($result);
//        var_dump($this);
         die;
         return $result;
     }
}
