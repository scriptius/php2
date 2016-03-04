<?php

namespace App\Models;

use App\Model;
use App\Db;

/**
 * Class Author
 * @package App\Models
 * @property integer $id
 * @property string $author
 */
class Author extends Model
{
    const TABLE = 'authors';
    public $id;
    public $name;

    public static function findByName($name)
    {
        $db = Db::instance();
        $res = $db->query(
            'SELECT * FROM ' . static::TABLE . ' WHERE name = :name', static::class, [':name' => $name]
        );

        return (!empty($res[0])) ? $res[0] : false;
    }
}
