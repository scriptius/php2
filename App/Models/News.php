<?php

namespace App\Models;

use App\Model;
use App\DB;
use App\magicMethods;
/**
 * Class news
 * @package App\Models
 */
class News extends Model  {
use magicMethods;
    const TABLE = 'news';
    public $title;
    public $text;
    public $date;
    public $author_id;

    /**
     * @return array Возвращает последние 3 новости
     */
    public function LastNews() {
        $db = new Db();
        return $db->query(
                        'SELECT * FROM ' . static::TABLE . ' ORDER BY date DESC limit 3', static::class
        );
    }

    /**
     * @param $k Имя недоступного свойства
     * @return bool or obj Возвлащает или свойство или объект Author
     * (в случае запроса свойста "authors" ) или FALSE - если свойство отсутствует
     */
    public function __get($k) {
        if ('authors' == $k and !empty($this->author_id)) {
            $authors = Author::findById((int)$this->author_id);
            return $authors;
        } else {
            if(array_key_exists($k, $this->data)){
                return $this->data[$k];
            }else{
                return false;
            }
        }
    }

    public function __isset($k)
    {

        if(array_key_exists($k, $this->data)){
            return $this->data[$k] ;
        }else{
            return false;
        }

    }


}
