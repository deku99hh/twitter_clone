<?php

class helpers
{
    public static function formatPostText($text)
    {
        $pattern = '/#([\p{L}\p{N}_]+)/u';
        
        $replacement = '<a href="http://mytwitter.local/post/search/$1" class="hashtag-link">#$1</a>';
        
        return preg_replace($pattern, $replacement, $text);
    }
}
