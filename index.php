<?php
require_once('config.php');

$vimeo_videos = preg_split('/,/', VIMEO_VIDEOS);
$videos = array();
foreach ($vimeo_videos as $video) {
    $url = sprintf('http://vimeo.com/api/v2/video/%d.json', $video);
    $video_data = json_decode(file_get_contents($url));
    $videos[] = $video_data[0];

}
View::write('videos', $videos);

View::write('page', 'home');
View::addScript('js/home.js');
View::addStyle('css/home.css');
View::renderCommonLayout('home');

