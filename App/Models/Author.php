<?php

namespace App\Models;
use App\Model;

/**
 * Class Author
 * @package App\Models
 * @property integer $id
 * @property string $author

 */
class Author extends Model{
    const TABLE = 'authors';
    public $id;
    public $author;
}
