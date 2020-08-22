<?php

//ini_set('display_errors', 1);
//error_reporting(E_ALL);

define("ROOT", $_SERVER['DOCUMENT_ROOT']);

require_once ROOT . '/vendor/autoload.php';

require_once ROOT . '/app/Core/Routing/Router.php';

$router = new \App\Core\Routing\Router();

$router->run();