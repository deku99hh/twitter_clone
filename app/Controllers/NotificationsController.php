<?php

class NotificationsController{

    public function index()
    {
        $notifications_model = new notifications();
        $my_notification = $notifications_model->get_my_Notification($_SESSION['user_info']['id']);
        // print_r($my_notification);
        $data = ['my_notification' => $my_notification, ];

        View::load('notifications', $data);
    }
    public static function notificate_followers_for_post($author_id)
    {
        $notifications_model = new notifications();
        $follows_model = new follows();

        $who_follows_me = $follows_model->get_followeds($author_id);
        $notifications_model->send_Notification_to_my_followers($who_follows_me, "check who posted a post!, one you follow!");

    }

    public static function notificate_author_for_like($post_id)
    {
        $notifications_model = new notifications();
        $posts_model = new posts();

        $author_id = $posts_model->get_author_id($post_id);
        $author_id = $author_id['AUTHOR'];
        $notifications_model->send_Notification_to_author($author_id, $post_id, "someone loved your post");
    }

    public static function notificate_author_for_comments($post_id)
    {
        $notifications_model = new notifications();
        $posts_model = new posts();

        $author_id = $posts_model->get_author_id($post_id);
        $author_id = $author_id['AUTHOR'];
        $notifications_model->send_Notification_to_author($author_id, $post_id, "someone commented on your post");
    }




}