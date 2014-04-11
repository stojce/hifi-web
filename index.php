<?php
require_once('config.php');

$jobList = new JobList();
View::write('jobList', $jobList->get());
View::write('page', 'home');
View::addScript('js/home.js');
View::addStyle('css/home.css');
View::renderCommonLayout('home');
