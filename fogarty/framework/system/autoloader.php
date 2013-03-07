<?php

// Autoloader

return function($class) {

    $class = strtolower($class);
    $file = PUBLIC_PATH.FRAMEWORK_PATH.$class.EXT;
    if(file_exists($file) && is_readable($file)) {
        require_once $file;
    }

};

