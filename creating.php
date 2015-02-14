<?php
require_once('config.php');

View::$title = 'High Fidelity code';
View::write('page', 'creating');

View::addStyle('css/creating.css');

View::addScript('js/creating.js');

View::renderCommonLayout('creating');
