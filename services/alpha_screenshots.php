<?php
require_once dirname(__FILE__) . '/../config.php';

function getPosts($fromId) {
    $url = sprintf(SCREENSHOTS_URL, $fromId, DISCOURSE_API_KEY, DISCOURSE_API_USERNAME);
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

    $result = curl_exec($ch);
    curl_close($ch);

    $result = json_decode($result, true);
    return $result;
}

function parsePosts($posts, $max_count) {
    $images = [];
    if (!empty($posts) && !empty($posts['post_stream']) && !empty($posts['post_stream']['posts'])) {

        $posts = array_reverse($posts['post_stream']['posts']);
        foreach($posts as $post) {

            echo $post['post_number'];

            $imgsrc_regex = '#<\s*img [^\>]*src\s*=\s*(["\'])(.*?)\1#im';
            preg_match($imgsrc_regex, $post['cooked'], $matches);

            if (!empty($matches) && is_array($matches) && count($matches) > 2) {
                $imClass = new stdClass;
                $imClass->image = DISCOURSE_URL . $matches[2];
                $images[] =  $imClass;
            }

            if (count($images) >= $max_count) {
                break;
            }
        }
    }

    return $images;
}

$images = [];
$imgsCount = SCREENSHOTS_COUNT;
$last_post_id = PHP_INT_MAX;

while(true) {
    $res = getPosts($last_post_id);

    if ($res == null) {
        break;
    }

    if (!empty($res) && !empty($res['post_stream']) && !empty($res['post_stream']['posts'])) {
        $last_post_id = $res['post_stream']['posts'][0]['post_number'];
        $last_post_id -= DISCOURSE_API_PADDING; //remove discourse offset
    }

    $images = array_merge($images, parsePosts($res, $imgsCount));
    $imgsCount -= count($images);

    if (count($images) >= SCREENSHOTS_COUNT) {
        break;
    }
}

if (!empty($images)) {
    $fh = fopen(SCREENSHOT_FILE_PATH, "w");
    fwrite($fh, json_encode($images));
    fclose($fh);
}

var_dump($images);
