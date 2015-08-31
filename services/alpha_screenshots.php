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

//    // TMP
//    $cookies = "_forum_session=BAh7B0kiD3Nlc3Npb25faWQGOgZFVEkiJTQzZGMyNDIwODg1ZjE4YTY3YWI1MzNjYWQ1MGRiNzE1BjsAVEkiEF9jc3JmX3Rva2VuBjsARkkiMTdVZ1B2UXo0dHBHc0RDcTNqVDBBK2p0SDBEZzY3RUdXMDdLa0I2UERuTzA9BjsARg%3D%3D--d35114770e39c51afad408f6a946619c215dcc9c; _t=624e3036804b91cb0c0caf85f8f2051d";
//    curl_setopt($ch, CURLOPT_COOKIE, $cookies);
//    //

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
                echo " - has image\n";
            } else {
                echo " - NO image\n";
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
