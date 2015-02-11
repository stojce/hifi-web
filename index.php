<?php

require_once('config.php');

View::write('page', 'home');
View::addScript('js/skrollr.js');
View::addScript('js/home.js');
View::addStyle('css/home.css');

View::addScript('js/chosen/chosen.jquery.min.js');
View::addStyle('css/chosen/chosen.min.css');

View::renderCommonLayout('home');

