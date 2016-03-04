<?php

namespace App\Models;

use App\Model;
use App\Db;

class User extends Model
//implements \Countable
{
    const TABLE = 'users';
    public $id;
    public $email;
    public $firstName;
    public $lastName;
    public $login;

    public static function findUserByLogin($login)
    {
        $db = Db::instance();
        $res = $db->query(
            'SELECT pass FROM ' . static::TABLE . ' WHERE login = :login', static::class, [':login' => $login]
        );

        return (!empty($res[0])) ? $res[0] : false;;
    }


}
