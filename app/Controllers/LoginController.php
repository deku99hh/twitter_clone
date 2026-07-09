<?php

class LoginController{

    public function __construct(){
        AuthorisationMiddleware::check_for_login();
    }

    public function index(){
        // echo "ghdghdfgdhg";
        // $data['title'] = "ss";


        View::load('login');
    }

    public function login(){
        // echo "fsdfsddddddddddddddddd";
        // $data['title'] = "dfsdfsfsfd";

        AuthorisationMiddleware::check_for_POST();
        $username = $_POST["username"];
        $pwd = $_POST["pwd"];

        // echo $pwd . $username ;

        $db = new user();


        try {

            // ERROR HANDLER
            $errors = [];

            if (Validation::is_input_empty($username, $pwd)) {
                $errors['empty_input'] = "fill in all fields!";
            } else {
                
                if (!$db->is_user_exsist($username)) {
                $errors['user_does_not_exsist'] = "user does not exsist!";
                }
                if ($db->is_password_wrong($username, $pwd)) {
                $errors['wrong_password'] = "wrong password!";
                }

            }    

            if ($errors) {
                $_SESSION['errors_login'] = $errors;
                header("location: " . BURL . "login");
                die();
            }

            $user_data = $db->get_user_data($username);
            $_SESSION['user_info'] = [
                'username' => $user_data['username'],
                'email' => $user_data['email'],
                'verified' => $user_data['verified'],
                'name' => $user_data['name'],
            ];
            
        // echo "fsdfsddddddddddddddddd";
            
            header("location: " . BURL);
            die();

        } catch (PDOException $e) {
            die("Query failed: " . $e->getMessage());
        }


        // header("location: " . BURL . "login");
        // header("location: " . BURL);
    }
}