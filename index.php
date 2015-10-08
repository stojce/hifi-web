<?php

require_once('config.php');

$context = stream_context_create(array(
    'http'=>array('header' => "User-Agent: hifi-web\r\n")
));

$places = array(
    ["name" => "Entry", "address" => "hifi://entry", "thumb" => "img/places/entry.png"],
    ["name" => "CellScience", "address" => "hifi://cellscience", "thumb" => "img/places/cellscience.png"],
    ["name" => "Sandbox", "address" => "hifi://sandbox", "thumb" => "img/places/sandbox.png"],
    ["name" => "Music", "address" => "hifi://music", "thumb" => "img/places/music.png"],
    ["name" => "Game", "address" => "hifi://game", "thumb" => "img/places/polyworld.png"],
);
View::write('places', $places);
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
View::addStyle('css/owl.carousel.css');

View::addScript('js/smooth-scroll/smooth-scroll.min.js');
View::addScript('js/touch-scroll/owl.carousel.min.js');

View::renderCommonLayout('home');

