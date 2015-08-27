<?php

use Guzzle\Plugin\Cookie\Cookie;
use Guzzle\Plugin\Cookie\CookieJar\ArrayCookieJar;

class Slideshow
{
    public static function getSlideshowData() {
        $filepath = "media/slideshow.json";
        $json = '';
        if (file_exists($filepath)) {
            $json = file_get_contents($filepath );
        }

        return $json;
    }
}
