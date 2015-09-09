<?php

class Slideshow
{
    public static function getSlideshowData() {
        $json = '';
        if (file_exists(SCREENSHOT_FILE_PATH)) {
            $json = file_get_contents(SCREENSHOT_FILE_PATH);
        }

        return $json;
    }
}
