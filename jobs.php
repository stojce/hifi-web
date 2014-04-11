<?php
require_once('config.php');

View::$title = 'Jobs at High Fidelity';
View::write('page', 'jobs');
View::addScript('js/three.min.js');
View::addScript('js/jobs.js');
View::addStyle('css/jobs.css');

$jobList = new JobList();
View::write('jobList', $jobList->get());

View::renderCommonLayout('jobs');
