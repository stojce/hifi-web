<?php

require('blog/wp-blog-header.php');
require_once('config.php');

$url = sprintf('http://vimeo.com/api/v2/%s/videos.json', VIMEO_NICKNAME);
View::write('videos', json_decode(file_get_contents($url)));

View::write('posts', get_posts(array(
    'numberposts' => 4,
    'post_status' => 'publish',
    'post_type' => 'post',
    'orderby' => 'post_date'
)));

View::write('page', 'home');
View::addScript('js/skrollr.js');
View::addScript('js/home.js');
View::addStyle('css/home.css');
View::renderCommonLayout('home');

