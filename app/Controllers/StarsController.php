<?php

class StarsController{

    public function add($id)
    {
        // AuthorisationMiddleware::check_for_POST("");
        $stars_data = [
            'post_id' => $id,
            'user' => $_SESSION['user_info']['id'],
        ];
        // die();

        $stars_model = new stars();

        $stars_model->add($stars_data);

        echo "dd";

        // header("Refresh:0");
        echo "<script>window.history.back();</script>";


    }

    public function get()
    {
        $db = new stars();
        $posts = $db->get();

        $data = ['posts'=>$posts,];

        // print_r($posts);
        foreach ($data['posts'] as &$post) {
            $post['post_text'] = helpers::formatPostText($post['post_text']);
        }


        View::load('search',$data);

    
    }




}