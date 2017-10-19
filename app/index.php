<?php
// Start Session
session_start();

// Include Config
require('config.php');

//require('classes/Messages.php');
require('classes/Router.php');
require('classes/Controller.php');
require('classes/Model.php');

require('controllers/home.php');
//require('controllers/shares.php');
require('controllers/users.php');

require('models/home.php');
//require('models/share.php');
require('models/user.php');

if(array_key_exists('controller', $_GET) || array_key_exists('action', $_GET)){

} else {
	$_GET['controller'] = "";
	$_GET['action'] = "";
}

$router = new Router($_GET);
$controller = $router->createController();
if($controller){
	$controller->executeAction();
}