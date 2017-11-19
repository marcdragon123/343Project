<?php
require_once('../core/Container.php');
require_once('../Config.php');
require_once('../models/user.php');
require_once('../controllers/Controller.php');
require_once('../core/Gateways/userTable.php');
require_once('../classes/Model.php');
require_once('../models/Account.php');



?>
<!DOCTYPE html>


<html lang="en-US">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel='stylesheet' href='css/style.css' type='text/css' media='all' />
        <title>SOEN 343 E-Commerce</title>

    </head>
    <body>
       <div class="login-page">
            <div class="form">
                <form class="login-form" action="../controllers/loginController.php" method="POST">
                    <input type="text" placeholder="Email" name="email"/>
                    <input type="password" placeholder="Password" name="password"/>
                    <input type="submit" value="Log In" name="submit">
                    <?php 
                    echo "Hello1";
                    $controller = new Container();
                    

                     ?>
                    <p class="message">Not registered? <a href="#">Create an account</a></p>
                </form>
            </div>
            <?php

 
 /*             
$array = array("Email","Password");
$controller = new Controller($array);

$model = new Model();
$controller->givesData($model);  
$db = new Database();
$model->update($db);

$userTable = new userTable();
$user = new User();
$userTable->populateUser($user);
echo "hello!";
print_r($user->getFirstName());


*/


            ?>
        </div>
    </body>
    
    
</html>    
    
