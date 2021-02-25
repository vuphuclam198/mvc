<?php

use Aht\Dispatcher;
use Aht\Router;
use Aht\Request;
use Aht\Config\Core;

require_once '../vendor/autoload.php';
define('WEBROOT', str_replace("Webroot/index.php", "", $_SERVER["SCRIPT_NAME"]));
define('ROOT', str_replace("Webroot/index.php", "", $_SERVER["SCRIPT_FILENAME"]));

include(ROOT . 'Config/core.php');

$dispatch = new Dispatcher();
$dispatch->dispatch();

?>