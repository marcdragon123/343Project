<?php require_once '../core/Container.php';



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
                    $controller = new Container();
                   
                     ?>
                    <p class="message">Not registered? <a href="#">Create an account</a></p>
                </form>
            </div>
        </div>
    </body>
    
    
</html>    
    
