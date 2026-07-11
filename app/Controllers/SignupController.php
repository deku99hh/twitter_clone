<?php

class SignupController{

    public function __construct(){
        AuthorisationMiddleware::check_for_login();
    }

    public function index(){
        // echo "ghdghdfgdhg";
        // $data['title'] = "ss";


        View::load('Signup');
    }

    public function signup(){
        // echo "fsdfsddddddddddddddddd";
        // $data['title'] = "dfsdfsfsfd";

        AuthorisationMiddleware::check_for_POST();
        $username = $_POST["username"];
        $pwd = $_POST["pwd"];
        $email = $_POST["email"];
        $name = $_POST["name"];

        // echo $pwd . $username ;

        $db = new user();


        try {

            // ERROR HANDLER
            $errors = [];

            if (Validation::is_input_empty($username, $pwd, $email)) {
                $errors['empty_input'] = "fill in all fields!";
            } else {
                if (Validation::is_email_invalid($email)) {
                    $errors['invalid_email'] = "invalid email used!";
                }
                if ($db->is_user_exsist($username)) {
                    $errors['username_taken'] = "username already taken!";
                }
                if ($db->is_email_registered($email)) {
                    $errors['email_used'] = "email alredy registerd!";
                }

            }    

            if ($errors) {
                $_SESSION['errors_Signup'] = $errors;

                $signupData = [
                    "username" => $username,
                    "email" => $email,
                    'name' => $name,
                ];
                $_SESSION['signupData'] = $signupData;

                header("location: " . BURL . "Signup");
                die();
            }

            $db->creat_user($username, $name, $pwd, $email);
            
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