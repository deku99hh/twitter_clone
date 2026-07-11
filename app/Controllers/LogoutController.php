<?php

class LogoutController{
    
    public function index()
    {
        unset($_SESSION['user_info']);
        header("location: " . BURL);
    }
}