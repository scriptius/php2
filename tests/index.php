<?php


require __DIR__ . '\..\autoload.php';

$config = App\Config::instance();
echo $config->data['db']['host'];


    
//$avto1 = new \App\avto;
//$avto2 = new \App\avto;
//
//var_dump($avto1);
//var_dump($avto2);

$news = new \App\Models\news;
$resNews = $news->LastNews();
var_dump($resNews);


$db = new App\Db();
        $res =  $db->query(
            'SELECT * FROM ' . App\Models\news::TABLE.' WHERE id = :param',
             'App\Models\news', [ ':param' => 3]
        );

        $res = (!empty($res))? $res :  false;
        var_dump($res);


        $exec= $db->execute("INSERT INTO `users`( `FirstName`, `LastName`, `email`)"
                . " VALUES (:FirstName,:LastName,:email)", [':FirstName'=>'Igor',':LastName'=>'Smirnov',
                    ':email'=>'is@ya.ru']);
                var_dump($exec);



var_dump(\App\Models\news::findById(1));

