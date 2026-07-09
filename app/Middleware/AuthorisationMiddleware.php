<?php

class AuthorisationMiddleware{
    public static function check_for_login(){

        if (isset($_SESSION['user_info'])) {
            header("location: " . BURL);
        }
    }

    public static function check_for_POST(){
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            
        } else {
            header("location: " . BURL . "login");
        }
    }
}