<?php
require_once('config.php');

View::write('page', 'home');
View::addScript('js/home.js');
View::addStyle('css/home.css');
View::renderCommonLayout('home');
