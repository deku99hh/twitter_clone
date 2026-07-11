<?php

class Validation{
    public static function is_input_empty($username, $pwd, $email = null){
        if (empty($username) || empty($pwd)) {
            return true;
        } else {
            return false;
        }

    }

    public static function is_email_invalid($email){
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
}


}