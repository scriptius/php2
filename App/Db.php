<?php

namespace App;

class Db {

    use Singleton;

    protected $dbh;

    protected function __construct() {
        try {
            $this->dbh = new \PDO('mysql:host=127.0.0.1;dbname=php2', 'root', '');
        } catch (\PDOException $e) {
            throw new \App\Exceptions\Db($e,100);
        }
    }

    public function execute($sql, $data = []) {
        $sth = $this->dbh->prepare($sql);
        $sth->execute($data);
        if ('00000' != $sth->errorCode()) {
            $ex = new \App\Exceptions\Db('Запрос не выполнился',101);
            throw $ex;
        } else {
            return true;
        }
    }

    public function query($sql, $class, $data = []) {
        $sth = $this->dbh->prepare($sql);
        $sth->execute($data);
        if ('00000' != $sth->errorCode()) {
            $ex = new \App\Exceptions\Db('Запрос не выполнился',101);
            throw $ex;
        }
        $res = $sth->fetchAll(\PDO::FETCH_CLASS, $class);
        if (!empty($res)) {
            return $res;
        } else {
            throw new \App\Exceptions\Error404('Запись в БД не найдена',404);
        }
    }

}
