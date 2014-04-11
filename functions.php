<?php

function hifi_autoloader($class) {
    $file = realpath(dirname(__FILE__) . '/classes') . "/$class.class.php";
    if (file_exists($file)) {
        require_once($file);
    }
}

spl_autoload_register('hifi_autoloader');
