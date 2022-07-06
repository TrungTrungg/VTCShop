<?php

class Response{
    public function redirect($uri = 'home') {
        if(preg_match('~^(http|https)~is', $uri)) {
        $url = $uri;
        }else {
            $url = _WEB_ROOT.'/'.$uri;
        }
        header("location: ".$url);
        exit;
    }
}

?>