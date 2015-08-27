<?php
require_once 'config.php';

View::$title = 'High Fidelity Slideshow';
View::write('page', 'slideshow');

View::addStyle('css/slideshow.css');
View::addScript('js/galleria/galleria-1.4.2.min.js');
View::addScript('js/slideshow.js');

View::write('slideshowData', Slideshow::getSlideshowData());

View::$header = 'layout/empty/header';
View::$footer = 'layout/empty/footer';
View::renderCommonLayout('slideshow');
