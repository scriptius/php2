<?php

require $_SERVER['DOCUMENT_ROOT'] . '\autoload.php';

try {
    $user = App\Models\User::findById(5);
    var_dump($user);
} catch (\App\Exceptions\Db $e) {
    $e->view->errors = $e->messageForUsers;
    $e->view->display('\..\App\templates\DatabaseError.php');
} catch (App\Exceptions\Error404 $e) {
    $e->view->errors = $e->messageForUsers;
    $e->view->display('\..\App\templates\Error404.php');
}
//
//try{
//   $user = App\Models\User::findById(5);
//   var_dump($user);
//}catch(App\Exceptions\Error404 $e){
//    var_dump($e);
//   $e->view->display('\..\App\templates\DatabaseError.php');
//}catch(App\Exceptions\Db $e) {
//    var_dump($e);
//    $e->view->display('\..\App\templates\DatabaseError.php');
//}
//try{
//   $user = App\Models\User::findById(5);
//   var_dump($user);
//}catch(App\Exceptions\Error404 $e){
//    var_dump($e);
//   $e->view->display('\..\App\templates\DatabaseError.php');
//}catch(App\Exceptions\Db $e) {
//    var_dump($e);
//    $e->view->display('\..\App\templates\DatabaseError.php');
//}

//var_dump($user);
//$test = new App\Logger('dvds','eWVv');
//var_dump($test);
//try{
//    var_dump(\App\Models\News::findAll());
//}  catch (App\Exceptions\Error404 $e){
//    var_dump($e);
//}
//try{
//   $test = new App\Models\User();
//$test->fill(['id'=>100,'email'=>'dd@rr.com','firstName'=>'Vitya','lastName'=>'Mamonov', 'login'=>'c']);
//
//}catch (\App\MultiException $e){
//    echo var_dump($e[0]->getMessage());
//}

