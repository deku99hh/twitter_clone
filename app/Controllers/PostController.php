<?php

class PostController{



    public function post()
    {
        AuthorisationMiddleware::check_for_POST("");
        $post_text = $_POST['post_text'];
        $post_dsta = [
            'post_text' => $post_text,
            'author' => $_SESSION['user_info']['id'],
            'reposted_from' => null
        ];

        $posts_model = new posts();

        $posts_model->new_post($post_dsta);

        header("Refresh:0");
            
    }

    public function comment($id)
    {
        // print_r($id);
        $posts_model = new posts();

        $post_data = $posts_model->get_post($id);
        View::load('comment', $post_data);

    }

    public function comment_comment($id)
    {
        AuthorisationMiddleware::check_for_POST("");
        $comment_text = $_POST['comment_text'];
        $comment_data = [
            'comment_text' => $comment_text,
            'author' => $_SESSION['user_info']['id'],
            'post' => $id
        ];

        $posts_model = new posts();

        $posts_model->new_comment($comment_data);

        
        header("location: " . BURL . "Post/open_post/" . $id);
    }

    public function open_post($id)
    {
        // print_r($id);
        $posts_model = new posts();

        $post_data = $posts_model->get_post($id);
        $commentsarr = $posts_model->get_comments($id);

        $data = [
            'post_data' => $post_data,
            'commentsarr' => $commentsarr
        ];

        foreach ($data['post_data'] as &$post) {
            $post['post_text'] = helpers::formatPostText($post['post_text']);
        }

        View::load('post', $data);

    }

    public function like($id)
    {
        // print_r($id);
        $posts_model = new posts();
        $posts_model->like($id, $_SESSION['user_info']['id']);


        echo "<script>window.history.back();</script>";
    }

    public function search($key_words)
    {
        $posts_model = new posts();
        $posts = $posts_model->search($key_words);

        $data = ['posts'=>$posts,];

        // print_r($posts);
        foreach ($data['posts'] as &$post) {
            $post['post_text'] = helpers::formatPostText($post['post_text']);
        }


        View::load('search',$data);

    }











}
