<?php

require_once("config.php");

spl_autoload_register(function($class) {
    $file = APP_DIR . str_replace("\\", "/", $class) . ".php";
    
    require_once($file);
});