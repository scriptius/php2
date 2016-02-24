<?php

namespace App;

use App\Models\User;

session_start();

class Authorization

{
    public static function logIn() {

        if (!empty($_POST['login']) and !empty($_POST['pass'])and  md5($_POST['pass'])== md5(User::findUserByLogin($_POST['login'])->pass) ) {
            $_SESSION['access'] = true;
            return true;
        } else {
            return false;
        }
    }

    public static function logOut() {
        unset($_SESSION['access']);
        return (!isset($_SESSION['access'])) ? true : false;
    }

}
