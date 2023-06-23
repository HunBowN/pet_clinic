<?php 

error_reporting(E_ALL);

ini_set('max_execution_time', '0');

$uri = $_SERVER['REQUEST_URI'];

require_once($_SERVER["DOCUMENT_ROOT"] . '/app/bootstrap.php');
require_once($_SERVER["DOCUMENT_ROOT"] . '/app/modules/database/Database.php');

$routes = require_once( FROOT . '/app/routes/routes.php');


$track = ( new Router )->getTrack($routes, $_SERVER['REQUEST_URI']);

$page = ( new Dispatcher )->getPage($track);
echo (new View)->render($page);



