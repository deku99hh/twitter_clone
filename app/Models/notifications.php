<?php

class notifications{

    private $table = "notifications";
    private $pdo;

    public function __construct(){
        $this->pdo = new DB();
        $this->pdo = $this->pdo->connect();
    }

    public function send_Notification_to_my_followers($who_follows_me, $text)
    {
        foreach ($who_follows_me as $one_who_follow_me) {
            $query = "INSERT INTO notification (user, post, notification_text) VALUES (:user, null, :notification_text);";
            $stmt = $this->pdo->prepare($query);
    
            $stmt->bindParam(":user", $one_who_follow_me['id']);
            $stmt->bindParam(":notification_text", $text);
            $stmt->execute();
        }

    }

    public function send_Notification_to_author($author_id, $post_id, $text)
    {
        $query = "INSERT INTO notification (user, post, notification_text) VALUES (:user, :post_id, :notification_text);";
        $stmt = $this->pdo->prepare($query);

        $stmt->bindParam(":user", $author_id);
        $stmt->bindParam(":notification_text", $text);
        $stmt->bindParam(":post_id", $post_id);
        $stmt->execute();

    }

    public function get_my_Notification($id)
    {
        $query = "SELECT * FROM notification WHERE user = :user_id;";
                  
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(":user_id", $id);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;

        
    }


}