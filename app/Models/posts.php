<?php

class posts{

    private $table = "posts";
    private $pdo;

    public function __construct(){
        $this->pdo = new DB();
        $this->pdo = $this->pdo->connect();
    }

    public function get_posts()
    {
        $query = "SELECT 
                users.id, 
                users.username, 
                users.name, 
                users.verified,
                posts.id , 
                posts.post_text, 
                posts.created_at, 
                COUNT(DISTINCT likes.id) AS total_likes, 
                
                IF(stars.user IS NOT NULL, 1, 0) AS is_starred

            FROM users
            INNER JOIN posts ON users.id = posts.author
            LEFT JOIN likes ON likes.post_id = posts.id

            LEFT JOIN stars ON stars.post_id = posts.id AND stars.user = :current_user_id

            GROUP BY 
                users.id, 
                users.username, 
                users.name, 
                users.verified, 
                posts.id, 
                posts.post_text, 
                posts.created_at,
                stars.user;

            ";
                  
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(":current_user_id", $_SESSION['user_info']['id']);

        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // echo count($result);
        // echo '<br>';
        // echo '<br>';
        // echo '<br>';
        // echo '<br>';
        return $result;

    }

    public function get_posts_by_follows($my_id)
    {
        $query = "SELECT 
    users.id ,
    users.username, 
    users.name, 
    users.verified, 
    posts.id , 
    posts.post_text, 
    posts.created_at, 
    
    COALESCE(COUNT(DISTINCT likes.id), 0) AS total_likes, 
    
    MAX(IF(likes.user = :my_id , 1, 0)) AS is_liked, 
    
    IF(stars.user IS NOT NULL, 1, 0) AS is_starred

FROM users
INNER JOIN posts ON users.id = posts.author
INNER JOIN follows ON follows.user_who_is_followed = users.id

LEFT JOIN likes ON likes.post_id = posts.id
LEFT JOIN stars ON stars.post_id = posts.id AND stars.user = :my_id

WHERE follows.user_who_follow = :my_id

GROUP BY 
    users.id, 
    users.username, 
    users.name, 
    users.verified, 
    posts.id, 
    posts.post_text, 
    posts.created_at,
    stars.user;

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

    public function new_post($post_dsta)
    {
        $query = "INSERT INTO posts (post_text, author, reposted_from) VALUES (:post_text, :author, :reposted_from);";
        $stmt = $this->pdo->prepare($query);

        $stmt->bindParam(":post_text", $post_dsta['post_text']);
        $stmt->bindParam(":author", $post_dsta['author']);
        $stmt->bindParam(":reposted_from", $post_dsta['reposted_from']);
        $stmt->execute();

    }

    public function get_post($id)
    {
        $query = "SELECT users.id, users.username, users.name, users.verified ,posts.post_text, posts.created_at, posts.id, COUNT(likes.post_id) AS total_likes
            FROM users
            INNER JOIN posts ON users.id = posts.author
            LEFT JOIN likes ON likes.post_id = posts.id
            WHERE posts.id = :id
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
        $stmt->bindParam(":id", $id);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        // print_r($result);
        // echo '<br>';
        // echo '<br>';
        // echo '<br>';
        // echo '<br>';
        return $result;

    }

    public function new_comment($comment_data)
    {
        $query = "INSERT INTO comments (comments_text, author, post) VALUES (:comments_text, :author, :post);";
        $stmt = $this->pdo->prepare($query);

        $stmt->bindParam(":comments_text", $comment_data['comment_text']);
        $stmt->bindParam(":author", $comment_data['author']);
        $stmt->bindParam(":post", $comment_data['post']);
        $stmt->execute();

        NotificationsController::notificate_author_for_comments($comment_data['post']);
    }

    public function get_comments($id)
    {
        $query = "SELECT users.username, users.name, users.verified ,comments.comments_text, comments.created_at, comments.id
                    FROM users
                    INNER JOIN comments ON users.id = comments.author
                    WHERE comments.post = :id;";
                  
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();

        $result = $stmt->fetchall(PDO::FETCH_ASSOC);

        // echo count($result);
        // echo '<br>';
        // echo '<br>';
        // echo '<br>';
        // echo '<br>';
        return $result;

    }
// SELECT * FROM likes WHERE likes.user = 2 AND likes.post_id = 1
    public function like($post_id, $user)
    {
        $query = "SELECT * FROM likes WHERE likes.user = :user AND likes.post_id = :post_id";
                  
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(":user", $user);
        $stmt->bindParam(":post_id", $post_id);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$result) {
            $query = "INSERT INTO likes (user, post_id) VALUES (:user, :post_id);";
            $stmt = $this->pdo->prepare($query);
    
            $stmt->bindParam(":post_id", $post_id);
            $stmt->bindParam(":user", $user);
            $stmt->execute();

            NotificationsController::notificate_author_for_like($post_id);

        } else {
            $query = "DELETE FROM likes WHERE user= :user AND post_id = :post_id;";
            $stmt = $this->pdo->prepare($query);
    
            $stmt->bindParam(":post_id", $post_id);
            $stmt->bindParam(":user", $user);
            $stmt->execute();

        }

    }

    public function search($key_words)
    {
        $query = "SELECT 
                    users.id, 
                    users.username, 
                    users.name, 
                    users.verified,
                    posts.id, 
                    posts.post_text, 
                    posts.created_at, 
                    COUNT(DISTINCT likes.id) AS total_likes, 
                    IF(stars.user IS NOT NULL, 1, 0) AS is_starred
                FROM users
                INNER JOIN posts ON users.id = posts.author
                LEFT JOIN likes ON likes.post_id = posts.id
                LEFT JOIN stars ON stars.post_id = posts.id AND stars.user = :current_user_id
                WHERE posts.post_text LIKE :key_words
                GROUP BY 
                    users.id, 
                    users.username, 
                    users.name, 
                    users.verified, 
                    posts.id, 
                    posts.post_text, 
                    posts.created_at,
                    stars.user;
            ";
        $key_words = "%" . $key_words . "%";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(":key_words", $key_words);
        $stmt->bindParam(":current_user_id", $_SESSION['user_info']['id']);

        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // echo count($result);
        // echo '<br>';
        // echo '<br>';
        // echo '<br>';
        // echo '<br>';
        return $result;

    }

    public function get_author_id($post_id)
    {
        $query = "SELECT AUTHOR FROM posts WHERE id = :post_id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(":post_id", $post_id);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        print_r($result);
        return $result;

    }


}
