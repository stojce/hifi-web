<?php
require_once('config.php');

View::addStyle('css/company.css');

View::addScript('js/d3.v3.min.js');
View::addScript("js/dancerjs/src/dancer.js");
View::addScript("js/dancerjs/src/support.js");
View::addScript("js/dancerjs/src/adapterWebkit.js");
View::addScript("js/dancerjs/src/adapterMoz.js");
View::addScript("js/dancerjs/src/adapterFlash.js");
View::addScript("js/dancerjs/lib/flash_detect.js");
View::addScript("js/dancerjs/lib/fft.js");
View::addScript('js/adobe/AC_OETags.js');
View::addScript("js/company.js");

View::write('page', 'company');
View::$footer = 'layout/empty/footer';
View::renderCommonLayout('company');