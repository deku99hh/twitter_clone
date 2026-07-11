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

        foreach ($data['posts'] as &$post) {
            $post['post_text'] = helpers::formatPostText($post['post_text']);
        }
        // print_r($data);

        View::load('home',$data);
    }

    public function following(){

        $my_id = $_SESSION['user_info']['id'];
        // echo $id1;
        // echo '<br>';
        // echo $id2;
        // echo '<br>';
        // echo 'class ' . __CLASS__ . ' method ' . __METHOD__ ;

        $posts_model = new posts();
        $posts = $posts_model->get_posts_by_follows($my_id);

        
        $data = ['posts'=>$posts,];
        
        foreach ($data['posts'] as &$post) {
            $post['post_text'] = helpers::formatPostText($post['post_text']);
        }
        
        // print_r($posts);
        View::load('home',$data);
    }





}