<?php

namespace App\Models;

use App\Model;

class User extends Model
//implements \Countable
{

    const TABLE = 'users';

    public $id;
    public $email;
    public $firstName;
    public $lastName;

  
}
