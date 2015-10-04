<?php

require_once('config.php');

$context = stream_context_create(array(
    'http'=>array('header' => "User-Agent: hifi-web\r\n")
));

$places = json_decode(file_get_contents('https://metaverse.highfidelity.io/api/v1/places?flag=homepage', false, $context));
View::write('places', array_slice($places->data->places, 0, 16));

$domains = json_decode(file_get_contents('https://metaverse.highfidelity.io/api/v1/stats/domains', false, $context));
View::write('onlinedomains', $domains->data->num_online);

// get posts
include_once 'services/latest_blog_posts.php';
View::write('posts', $posts);

View::write('page', 'home');
View::addScript('js/home.js');
View::addStyle('css/home.css');

View::addScript('js/chosen/chosen.jquery.min.js');
View::addStyle('css/chosen/chosen.min.css');
View::addScript('js/smooth-scroll/smooth-scroll.min.js');

View::renderCommonLayout('home');

