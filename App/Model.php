<?php

namespace App;

use App\Db;

abstract class Model {

    const TABLE = '';

    public static function findAll() {
        $db = Db::instance();
        return $db->query(
                        'SELECT * FROM ' . static::TABLE, static::class
        );
    }

    public static function findById($id) {
        $db = Db::instance();
        $res = $db->query(
                'SELECT * FROM ' . static::TABLE . ' WHERE id = :param', static::class, [':param' => $id]
        );

        return (!empty($res[0])) ? $res[0] : false;
    }

    public function isNew() {
        return empty($this->id);
    }

    public function insert() {
        if (!$this->isNew()) {
            return;
        }
        $columns = [];
        $values = [];
        foreach ($this as $k => $v) {
            if ('id' == $k || 'data' == $k) {
                continue;
            }
            $columns[] = $k;
            $values[':' . $k] = $v;
        }

        $sql = 'INSERT INTO ' . static::TABLE . '
(' . implode(',', $columns) . ')
VALUES
(' . implode(',', array_keys($values)) . ')
        ';


        $db = Db::instance();
        var_dump($sql);
        var_dump($values);

        return $db->execute($sql, $values);
    }

    public function update() {

        if ($this->isNew()) {
            return;
        }
        foreach ($this as $k => $v) {
            if ('id' == $k ||  'data' == $k) {
                continue;
            }
            $colums[] = $k . ' = :' . $k;
            $values[':' . $k] = $v;
        }

        $sql = sprintf('UPDATE ' . static::TABLE . ' SET ' . implode(',', $colums) . ' WHERE id = %d', $this->id);
        $db = Db::instance();
        if ($db->execute($sql, $values)) {
            return true;
        } else {
            return false;
        }
    }

    public function save() {
        if ($this->isNew()) {
            $res = $this->insert();
        } else {
            $res = $this->update();
        }return $res;
    }

    public function delete() {
        if (!$this->isNew()) {
            $sql = sprintf('DELETE FROM ' . static::TABLE . ' WHERE id = %d ', $this->id);

            $db = Db::instance();
            if ($db->execute($sql)) {
                return true;
            }
        } else {
            return false;
        }
    }

    public function fill(array $data) {
        $e = new MultiException();
        foreach ($data as $k => $v) {
            if (property_exists($this, $k)) {
                switch ($k) {
                    case $data[$k] == '' and ! in_array($k, ['id', 'author_id']) :
                        $e[] = new \Exception('Пустые значения полей запрещены');
                    case strlen($data[$k]) < 5 and ! in_array($k, ['id', 'author_id']):
                        $e[] = new \Exception('Значениe "' . $k . '" должно быть не короче 5 символов');
                        $e->inLog();
                        throw $e;
                }
                $this->$k = $v;
            }

        }
        return $this;
    }

}
