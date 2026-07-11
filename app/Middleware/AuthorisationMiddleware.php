<?php

class AuthorisationMiddleware{
    public static function check_for_login(){

        if (isset($_SESSION['user_info'])) {
            header("location: " . BURL);
        }
    }

    public static function reverse_check_for_login(){

        if (!isset($_SESSION['user_info'])) {
            header("location: " . BURL);
        }
    }


    public static function check_for_POST($place){
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            
        } else {
            header("location: " . BURL . $place);
        }
    }
}