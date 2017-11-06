<?php
/**
 * Created by PhpStorm.
 * User: ahmadbiz
 * Date: 2017-11-05
 * Time: 2:36 PM
 */

// Start Session
session_start();

// Include Config
require('config.php');

require('classes/Messages.php');
require('classes/Router.php');
require('classes/Controller.php');

$router = new Router($_GET);
$controller = $router->createController();
if($controller){
    $controller->executeAction();
}
