<?php
require_once('config.php');

View::$title = 'High Fidelity code';
View::write('page', 'code');
View::addScript('js/packery.pkgd.min.js');
View::addScript('js/code.js');
View::addStyle('css/code.css');

$gh = new GithubCloud();
$gh->setToken(GITHUB_API_TOKEN);
$words = $gh->getWordsForRepo(GITHUB_REPO);
View::write('words', $words);

View::renderCommonLayout('code');
