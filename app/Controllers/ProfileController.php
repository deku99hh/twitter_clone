<?php

class ProfileController{
    public function __construct(){
        AuthorisationMiddleware::reverse_check_for_login();
    }

    public function index()
    {
        $db = new Profile();
        $data = $db->get_data($_SESSION['user_info']['username']);

        var_dump($data);

        // View::load('Profile', $data);
    }
}