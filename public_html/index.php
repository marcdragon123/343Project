<?php
/**
 * Created by PhpStorm.
 * users: ahmadbiz
 * Date: 2017-11-05
 * Time: 2:36 PM
 */
require_once __DIR__ .'/../domain/core/DomainObject.php';
require_once __DIR__ .'/../domain/core/ShoppingCart.php';
require_once __DIR__.'/mappers/MapperAbstract.php';
require_once __DIR__.'/mappers/CatalogMapper.php';

ini_set('memory_limit', '1024M');
// Start Session
session_start();
$_SESSION['cart'] = new ShoppingCart();
date_default_timezone_set('America/New_York');

require('config.php');

require('classes/Messages.php');
require('classes/Router.php');
require('classes/Controller.php');


require('../domain/core/Account.php');
require('../domain/core/Customer.php');
require('../domain/core/Administrator.php');
require('../domain/core/ProductCatalog.php');
require('../domain/core/Product.php');
require('../domain/core/Desktop.php');
require('../domain/core/Monitor.php');
require('../domain/core/Laptop.php');
require('../domain/core/Tablet.php');
require('../domain/core/Transaction.php');
require('../domain/core/TransactionsCatalog.php');


require('controllers/Admin.php');
require('controllers/users.php');
require('controllers/home.php');

require('mappers/CustomerMapper.php');
require('mappers/AdminMapper.php');


require('../domain/idmap/ShoppingCartIdMap.php');
require('../domain/idmap/idMap.php');
require('../domain/idmap/ProductsIdMap.php');
require('../domain/uow/UnitOfWork.php');


require('../data/tdgs/Model.php');
require('../data/tdgs/UserTDG.php');
require('../data/tdgs/monitorTDG.php');
require('../data/tdgs/laptopTDG.php');
require('../data/tdgs/tabletTDG.php');
require('../data/tdgs/desktopcomputerTDG.php');
require('../data/tdgs/transactionTDG.php');

require('../domain/activeCache/FileCaching.php');
require('../domain/activeCache/File.php');
require('../domain/activeCache/CustomerFile.php');



$router = new Router($_GET);
$controller = $router->createController();
if($controller){
    $controller->executeAction();
}
