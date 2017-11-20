<?php
/**
 * Created by PhpStorm.
 * users: ahmadbiz
 * Date: 2017-11-05
 * Time: 2:36 PM
 */

// Start Session
require('config.php');

require('classes/Messages.php');
require('classes/Router.php');
require('classes/Controller.php');


require('../domain/core/DomainObject.php');
require('../domain/core/Account.php');
require('../domain/core/Customer.php');
require('../domain/core/Administrator.php');

require('controllers/Admin.php');
require('controllers/users.php');
require('controllers/home.php');

require('mappers/MapperAbstract.php');
require('mappers/CustomerMapper.php');
require('mappers/CatalogMapper.php');

require('../domain/idmap/idMap.php');
require('../domain/idmap/ProductsIdMap.php');
require('../domain/uow/UnitOfWork.php');


require('../data/tdgs/Model.php');
require('../data/tdgs/UserTDG.php');
require('../data/tdgs/CatalogTDG.php');

require('../domain/activeCache/FileCaching.php');
require('../domain/activeCache/ProductFile.php');
require('../domain/activeCache/CustomerFile.php');



$router = new Router($_GET);
$controller = $router->createController();
if($controller){
    $controller->executeAction();
}
