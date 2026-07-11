<?php

class posts{

    private $table = "follows";
    private $pdo;

    public function __construct(){
        $this->pdo = new DB();
        $this->pdo = $this->pdo->connect();
    }

    public function get_posts()
    {
        $query = "SELECT users.id, users.username, users.name, users.verified ,posts.post_text, posts.created_at
                    FROM users
                    INNER JOIN posts 
                    ON users.id = posts.author;";
                  
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // echo count($result);
        // echo '<br>';
        // echo '<br>';
        // echo '<br>';
        // echo '<br>';
        return $result;

    }















}
