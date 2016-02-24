<?php

namespace App;

class Db {

    use Singleton;

    protected $dbh;

    protected function __construct() {
        try {
            $this->dbh = new \PDO('mysql:host=127.0.0.1;dbname=php2', 'root', '');
        } catch (\PDOException $e) {
            $ex = new \App\Exceptions\Db('Уважаемый пользователь, связь с базой потерялась:');
            $ex->connect($e);
//            throw new \App\Exceptions\Db('Отсутствует связь с базой: ', ['message' => $e->getMessage(), 'file' => $e->getFile()]);
        }
    }

    public function execute($sql, $data = []) {
        $sth = $this->dbh->prepare($sql);
        $sth->execute($data);
        if ('00000' != $sth->errorCode()) {
            $ex = new \App\Exceptions\Db('К сожалению, что-то пошло не так и Запрос не выполнился');
            $ex->request('Ошибка запроса - ' . $sth->queryString, __FILE__, __METHOD__);
        } else {
            return true;
        }
    }

    public function query($sql, $class, $data = []) {
        $sth = $this->dbh->prepare($sql);
        $sth->execute($data);
        if ('00000' != $sth->errorCode()) {
            $ex = new \App\Exceptions\Db('К сожалению, что-то пошло не так и Запрос не выполнился');
            $ex->request('Ошибка запроса - ' . $sth->queryString, __FILE__, __METHOD__);
        }
        $res = $sth->fetchAll(\PDO::FETCH_CLASS, $class);
        if (!empty($res)) {
            return $res;
        } else {
            throw new \App\Exceptions\Error404('К сожалению, то, что Вы искали пока отсутствует в БД  ', 'Запись в БД не найдена ', __FILE__, __METHOD__, $sql . '; Параметры: ' . implode(',', $data));
        }
    }

}
