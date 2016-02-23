<?php

namespace App\Models;

use App\Model;
use App\DB;
use App\magicMethods;
use App\MultiException;

/**
 * Class news
 *
 */
class News extends Model {

    use magicMethods;

    const TABLE = 'news';

    public $id;
    public $title;
    public $text;
    public $date;
    public $author_id;

    /**
     * @return array Возвращает последние 3 новости
     */
    public function LastNews() {
        $db = Db::instance();
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

        if ('author' == $k and ! empty($this->author_id)) {
            $author = Author::findById((int) $this->author_id);
            return $author;
        } else {
            if (array_key_exists($k, $this->data)) {
                return $this->data[$k];
            } else {
                return false;
            }
        }
    }

    /**
     * @param $k имя свойства
     * @return mixed возвращает или объект или false
     */
    public function __isset($k) {
        switch ($k) {
            case 'author':
                return !empty($this->author_id);
                break;
        }
        if (array_key_exists($k, $this->data)) {
            return $this->data[$k];
            var_dump($this->data[$k]);
        } else {
            return false;
        }
    }

}
