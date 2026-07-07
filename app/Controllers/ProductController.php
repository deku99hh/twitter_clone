<?php

class ProductController{

    public function index(){
        echo "hi";
    
        $db = new Product();

        var_dump($db->getAllProducts());
    }

    public function hello(){
        echo "hello";
    }
}