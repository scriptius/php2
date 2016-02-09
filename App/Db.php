<?php

namespace App;

class Db {
    use Singleton;
    protected $dbh;

    public function __construct() {
        $this->dbh = new \PDO('mysql:host=127.0.0.1;dbname=php2', 'root', '');
    }

    public function execute($sql, $data = []) {
//        echo $sql;
        $sth = $this->dbh->prepare($sql);
        $res = $sth->execute($data);

        return ['status'=>$res,'lastId'=> $this->dbh ->lastInsertId()];
    }

    public function query($sql, $class, $data = []) {
//        var_dump($sql);
        $sth = $this->dbh->prepare($sql);


//        foreach ($data as $key => $value) {
//            $sth->bindParam($key, $value);
//        }
        $res = $sth->execute($data);

        if (false !== $res) {

            return $sth->fetchAll(\PDO::FETCH_CLASS, $class);
        }
        return [];
    }

}
