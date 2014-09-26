<?php
require_once('config.php');

View::$title = 'High Fidelity press';
View::write('page', 'press');

View::addStyle('css/press.css');

View::addScript('js/press.js');
View::addScript('js/json-sans-eval.js');
View::addScript('js/game-of-life-v3.1.1.js');

View::renderCommonLayout('press');
