<?php

namespace App;

abstract class Model {

    const TABLE = '';

    public static function findAll() {
        $db = new Db();
        return $db->query(
            'SELECT * FROM ' . static::TABLE, static::class
        );
    }

    public static function findById($id) {
        $db = new Db();
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
            if ('id' == $k) {
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
//        echo $sql;

        $db = Db::instance();
        $res=$db->execute($sql, $values);
        var_dump($res);
        if ($res['status']) {
            $this->id = $res['lastId'];
            echo 'Запись успешно вставлена под номером - ' . $this->id;
            return true;
        } else {
            echo 'Вставка записи не удалась!';
            return false;
        }
    }

    public function update() {
        if ($this->isNew()) {
            return;
        }
        foreach ($this as $k => $v) {

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
            $res= $this->insert();
        } else {
            $res=$this->update();
        }return $res;
    }

    public function delete() {
        if (!$this->isNew()) {
            $sql = sprintf('DELETE FROM ' . static::TABLE . ' WHERE id = %d ', $this->id);

            $db = Db::instance();
            if ($db->execute($sql)) {
                echo 'Удаление id - ' . $this->id . ' из таблицы ' . static::TABLE . '  проведено успешно!';
                return true;
            }
        } else {
            echo ' Удаление не проведено';
            return false;
        }
    }

}
