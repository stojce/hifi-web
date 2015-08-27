<?php

define('SCREENSHOTS_COUNT', 20);
define('SCREENSHOTS_URL', 'http://192.168.10.200:3000/t/api-test-with-15-chars/%u.json');

$filepath = "media/slideshow.json";
$json = '';

if (file_exists($filepath)) {
    $json = file_get_contents($filepath );
}

$current_data = json_decode($json);

$url = sprintf(SCREENSHOTS_URL, $current_data->highest_post_number);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);

curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
//curl_setopt($ch, CURLOPT_TIMEOUT, 10);

// curl_setopt($ch, CURLOPT_COOKIE, "_forum_session=BAh7B0kiD3Nlc3Npb25faWQGOgZFVEkiJThjMTU5NWVlMmJhYTcwNWU2YjBkZWNjOGRiYWM1YzBlBjsAVEkiEF9jc3JmX3Rva2VuBjsARkkiMUVSVmR6WkZmeUpjNnBVSmx2bTB6UUpZWWFpZk9JL3JXK0UzY1pjeTExMGM9BjsARg%3D%3D--f0b0e1285e5cc949ea56d71770cbc35488d7ab06; _t=624e3036804b91cb0c0caf85f8f2051d'");

//curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, $this->verify_ssl);
//curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($args));
$result = curl_exec($ch);
curl_close($ch);

$result = json_decode($result, true);


$hp = (int)$result['highest_post_number'];
$images = [];

if (!empty($result) && !empty($result['post_stream']) && !empty($result['post_stream']['posts'])) {
    foreach($result['post_stream']['posts'] as $post) {
        $imgsrc_regex = '#<\s*img [^\>]*src\s*=\s*(["\'])(.*?)\1#im';
        preg_match($imgsrc_regex, $post['cooked'], $matches);

        if (!empty($matches) && is_array($matches) && count($matches) > 2) {
            $images[] = $matches[2];
        }
    }

}
