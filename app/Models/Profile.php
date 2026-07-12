<?php

class profile{

    private $table = "profile";
    private $pdo;

    public function __construct(){
        $this->pdo = new DB();
        $this->pdo = $this->pdo->connect();
    }

    public function get_data($username){

        $query = "SELECT users.id, users.username, users.name, users.created_at, about.about_text, about.birthday, about.links 
                  FROM users 
                  INNER JOIN about ON users.id = about.user_id 
                  WHERE username = :username;";
                  
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(":username", $username);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result;
    }
}
