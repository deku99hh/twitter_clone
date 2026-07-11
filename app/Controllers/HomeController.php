<?php

class HomeController{
    
    public function index(){
        // echo $id1;
        // echo '<br>';
        // echo $id2;
        // echo '<br>';
        // echo 'class ' . __CLASS__ . ' method ' . __METHOD__ ;

        $posts_model = new posts();
        $posts = $posts_model->get_posts();

        $data = ['posts'=>$posts,];

        // print_r($posts);
        View::load('home',$data);
    }

    public function post()
    {
        AuthorisationMiddleware::check_for_POST("");

    }
}