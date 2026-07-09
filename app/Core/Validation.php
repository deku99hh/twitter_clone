<?php

class Validation{
    public static function is_input_empty($username, $pwd){
        if (empty($username) || empty($pwd)) {
            return true;
        } else {
            return false;
        }

    }

}