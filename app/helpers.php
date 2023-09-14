<?php

if (! function_exists('dummyImage')) {
    function dummyImage(int $width, $height = null, $queryParams = null)
    {
        // $queryParams = "?grayscale&blur=1&random=1";
        return "//picsum.photos/{$width}"
            .($height ? "/{$height}" : "")
            .($queryParams ? "{$queryParams}" : "");
    }
}
if (! function_exists('dummyAvatar')) {
    function dummyAvatar(string $email, $s = 80, $d = 'mp', $r = 'g', $img = false, $atts = array() ) {
        $url = 'https://www.gravatar.com/avatar/';
        $url .= md5( strtolower( trim( $email ) ) );
        $url .= "?s=$s&d=$d&r=$r";
        if ( $img ) {
            $url = '<img src="' . $url . '"';
            foreach ( $atts as $key => $val )
                $url .= ' ' . $key . '="' . $val . '"';
            $url .= ' />';
        }
        return $url;
    }
}