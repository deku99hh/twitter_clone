<?php

class user{
    
    private $table = "users";
    private $pdo;

    public function __construct(){
        $this->pdo = new DB();
        $this->pdo = $this->pdo->connect();
    }

    public function is_user_exsist($username)
    {
        if ($this->get_user($username)) {
            return true;
        } else {
            return false;
        }

    }
    private function get_user($username)
    {

        $query = "SELECT username FROM users WHERE username = :username";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(":username", $username);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result;

    }

    public function is_password_wrong($username, $pwd)
    {
        $hashedpwd = $this->get_password($username);
        
        if (password_verify($pwd, $hashedpwd)) {
        // if ($pwd == $hashedpwd) {
            return false;
        } else {
            return true;
        }

    }
    private function get_password($username)
    {
        $query = "SELECT PWD FROM users WHERE username = :username;";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(":username", $username);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        
        return $result['PWD'];

    }   

    public function get_user_data($username)
    {

        $query = "SELECT username, email, verified, name, id FROM users WHERE username = :username;";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(":username", $username);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result;

    }

    public function creat_user($username, $name, $pwd, $email)
    {
        $this->set_user($username, $name, $pwd, $email);
    }
    private function set_user($username, $name, $pwd, $email)
    {

        $query = "INSERT INTO users (username, name, pwd, email) VALUES (:username, :name, :pwd, :email);";
        $stmt = $this->pdo->prepare($query);

        $options = [ 'cost' => 12 ];
        $hashedpwd = password_hash($pwd, PASSWORD_BCRYPT, $options);


        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":pwd", $hashedpwd);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":name", $name);
        $stmt->execute();

    }

    public function is_email_registered($email)
    {
        if ($this->get_email($email)) {
            return true;
        } else {
            return false;
        }
    }
    private function get_email($email)
    {
        $query = "SELECT username FROM users WHERE email = :email";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(":email", $email);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        
        return $result;

    }

}