<?php

class DB{

    // public function __construct(){
    //     return $this->pdo();
    // }

    public function connect(){
        return $this->pdo();
    }

    protected function pdo(){
        $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME;
        $dbusername = DB_USER;
        $dbpassword = DB_PASS;

        try {
            $pdo = new PDO($dsn, $dbusername, $dbpassword);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, pdo::ERRMODE_EXCEPTION);
        } catch ( PDOException $e ) {
            echo "connection faild " . $e->getMassage();
        }

        return $pdo;

    }
}