<?php
require_once('config.php');

View::$title = 'High Fidelity Place Names';
View::write('page', 'names');

View::addStyle('css/names.css');

View::addScript('js/names.js');

View::renderCommonLayout('names');
