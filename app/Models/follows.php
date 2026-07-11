<?php

class follows{

    private $table = "follows";
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

    // a follows b

    // all b'es
    public function get_follows($username_A)
    {
        $query = "SELECT users.id, users.username, users.name, users.verified 
                    FROM users
                    INNER JOIN follows 
                    ON users.id = follows.user_who_follow
                    WHERE follows.user_who_is_followed = :username_A;";
                  
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(":username_A", $username_A);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // echo count($result);
        // echo '<br>';
        // echo '<br>';
        // echo '<br>';
        // echo '<br>';
        return $result;

    }

    // a follows
    public function get_followeds($username_A)
    {
        $query = "SELECT users.id, users.username, users.name, users.verified 
                    FROM users
                    INNER JOIN follows 
                    ON users.id = follows.user_who_is_followed
                    WHERE follows.user_who_follow = :username_A;";
                  
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(":username_A", $username_A);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;

    }

    public function get_follows_num($username_A)
    {
        $who_follows_A = $this->get_follows($username_A);
        return count($who_follows_A);
    }

    public function get_followeds_num($username_A)
    {
        $who_A_is_following = $this->get_followeds($username_A);
        return count($who_A_is_following);
    }

}
