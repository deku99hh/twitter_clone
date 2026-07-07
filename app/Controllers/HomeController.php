<?php

class HomeController{
    
    public function index(){
        // echo $id1;
        // echo '<br>';
        // echo $id2;
        // echo '<br>';
        // echo 'class ' . __CLASS__ . ' method ' . __METHOD__ ;

        $data['title'] = 'homepassssssssssssssssssssssssssssssssssssssssssssssssssssssge';
        View::load('home',$data);
    }
}