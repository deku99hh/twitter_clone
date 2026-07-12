<?php

class SearchController {
    public function index()
    {
        if ($_POST["search"]) {

            $keyword = $_POST["search"];

            header("Location: http://mytwitter.local/POST/search/" . $keyword);
            exit;
        }

        // في حال الدخول الخاطئ للملف ارجع للرئيسية
        // header("Location: http://mytwitter.local");
        exit;

    }
}