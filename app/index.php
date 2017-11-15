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


require('../domain/core/DomainObject.php');
require('../domain/core/Account.php');
require('../domain/core/Customer.php');
require('../domain/core/Administrator.php');

require('controllers/Admin.php');
require('controllers/User.php');
require('controllers/home.php');

require('mappers/MapperAbstract.php');
require('mappers/CustomerMapper.php');

require('../domain/idmap/idMap.php');
require('../domain/uow/UnitOfWork.php');


require('../data/tdgs/Model.php');
require('../data/tdgs/UserTDG.php');




$router = new Router($_GET);
$controller = $router->createController();
if($controller){
    $controller->executeAction();
}
