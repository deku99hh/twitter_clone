<?php

class ProfileController{


    public function __construct(){
        AuthorisationMiddleware::reverse_check_for_login();
    }

    public function index()
    {
        $my_id = $_SESSION['user_info']['id'];
        $profile = new profile();
        $follows = new follows();

        $user_data = $profile->get_data($_SESSION['user_info']['username']);
        $num_who_follows_A = $follows->get_follows_num($my_id);
        $num_who_A_is_following = $follows->get_followeds_num($my_id);
        $follows_data = ['num_who_follows_A' => $num_who_follows_A,  'num_who_A_is_following' => $num_who_A_is_following];
        
        $data = array_merge($follows_data, $user_data);

        // var_dump($data);


        View::load('Profile', $data);
    }
}