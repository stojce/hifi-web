<?php
require_once('config.php');

View::write('page', 'company');
View::$footer = 'layout/empty/footer';

View::addStyle('css/company.css');
View::addScript("js/company.js");

View::renderCommonLayout('company');