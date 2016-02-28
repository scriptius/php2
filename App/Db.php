<?php

namespace App;

class Db {

    use Singleton;

    protected $dbh;

    protected function __construct() {
        $config = \App\Config::instance();
        try {
            $this->dbh = new \PDO('mysql:host=' . $config->data['db']['host'] . ';
                                  dbname=' .      $config->data['db']['dbname'],
                                                  $config->data['db']['login'], 
                                                  $config->data['db']['pass']);
            $this->dbh = new \PDO('mysql:host=127.0.0.1;dbname=php2', 'root', '');
        } catch (\PDOException $e) {
            throw new \App\Exceptions\Db($e, 100);
        }
    }

    public function execute($sql, $data = []) {
        $sth = $this->dbh->prepare($sql);
        $sth->execute($data);
        if ('00000' != $sth->errorCode()) {
            $ex = new \App\Exceptions\Db('Запрос не выполнился', 101);
            throw $ex;
        } else {
            return true;
        }
    }

    public function query($sql, $class, $data = []) {
        $sth = $this->dbh->prepare($sql);
        $sth->execute($data);
        if ('00000' != $sth->errorCode()) {
            $ex = new \App\Exceptions\Db('Запрос не выполнился', 101);
            throw $ex;
        }
        $res = $sth->fetchAll(\PDO::FETCH_CLASS, $class);
        return $res;
    }

}
