<?php
// Start Session
session_start();

// Include Config
require('config.php');

require('classes/Messages.php');
require('classes/Router.php');
require('classes/Controller.php');
require('classes/Model.php');

require('controllers/home.php');
require('controllers/admin.php');
require('controllers/users.php');

require('models/home.php');
require('models/admin.php');
require('models/user.php');

$router = new Router($_GET);
$controller = $router->createController();
if($controller){
	$controller->executeAction();
}