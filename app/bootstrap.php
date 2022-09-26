<?php
//session_start();

require_once('config/default.php');
require_once('../vendor/autoload.php');

// Load libraries
foreach(glob(APP_ROOT . '/src/libraries/*.php') as $f) {
    require_once($f);
} 
