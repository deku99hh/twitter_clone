<?php

class stars{
    
    private $table = "stars";
    private $pdo;

    public function __construct(){
        $this->pdo = new DB();
        $this->pdo = $this->pdo->connect();
    }

    public function add($stars_data)
    {

        $query = "SELECT * FROM stars WHERE stars.post_id = :post_id AND stars.user = :user";
                  
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(":user", $stars_data['user']);
        $stmt->bindParam(":post_id", $stars_data['post_id']);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$result) {
            $query = "INSERT INTO stars (user, post_id) VALUES (:user, :post_id);";
            $stmt = $this->pdo->prepare($query);
    
            $stmt->bindParam(":post_id", $stars_data['post_id']);
            $stmt->bindParam(":user", $stars_data['user']);
            $stmt->execute();
        } else {
            $query = "DELETE FROM stars WHERE user= :user AND post_id = :post_id;";
            $stmt = $this->pdo->prepare($query);
    
            $stmt->bindParam(":post_id", $stars_data['post_id']);
            $stmt->bindParam(":user", $stars_data['user']);
            $stmt->execute();

        }

    }


    public function get()
    {

        $my_id = $_SESSION['user_info']['id'];
    
        $query = "SELECT 
                users.id, 
                users.username, 
                users.name, 
                users.verified,
                posts.id , 
                posts.post_text, 
                posts.created_at, 
                COUNT(DISTINCT likes.id) AS total_likes, 
                1 AS is_starred 
            FROM users
            INNER JOIN posts ON users.id = posts.author
            LEFT JOIN likes ON likes.post_id = posts.id
            INNER JOIN stars ON stars.post_id = posts.id AND stars.user = :my_id
            GROUP BY 
                users.id, 
                users.username, 
                users.name, 
                users.verified, 
                posts.id, 
                posts.post_text, 
                posts.created_at;
            ";
                  
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(":my_id", $my_id);
    
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