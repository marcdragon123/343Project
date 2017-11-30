<html>
<head>
    <title>CompStore343</title>
    <link rel="stylesheet" href="<?php echo ROOT_PATH; ?>content/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo ROOT_PATH; ?>content/css/light-bootstrap-dashboard.css">
</head>
<body>
<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <?php if (isset($_SESSION['is_logged_in'])) :?>
                    <?php if($_SESSION['user_data']['Type'] === 'A') : ?>
                        <li><a href="<?php echo ROOT_URL; ?>admin">Admin Main</a></li>
                        <li><a href = "<?php echo ROOT_URL; ?>admin">View Catalog</a></li>
                    <?php else :?>
                    <?php endif;?>
                <?php endif;?>
                <li><a href="<?php echo ROOT_URL; ?>">Home</a></li>

                <?php if(isset($_SESSION['is_logged_in'])) : ?>
                <?php else :?>
                    <li><a href="<?php echo ROOT_URL; ?>admin/adminlogin">Administrator</a></li>
                <?php endif; ?>


            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php if(isset($_SESSION['is_logged_in'])) : ?>
                    <li><a href="<?php echo ROOT_URL; ?>">Welcome <?php echo ucwords($_SESSION['user_data']['FirstName']); ?></a></li>
                    <li><a href="<?php echo ROOT_URL; ?>users/deleteUser">Delete Account</a></li>
                    <?php if ($_SESSION['user_data']['Type']==='A') :?>
                        <li><a type="logout" href="<?php echo ROOT_URL; ?>admin/logout">Logout</a></li>
                    <?php else :?>
                        <li><a type="logout" href="<?php echo ROOT_URL; ?>users/logout">Logout</a></li>
                    <?php endif; ?>
                <?php else : ?>
                    <li><a href="<?php echo ROOT_URL; ?>users/login">Login</a></li>
                    <li><a href="<?php echo ROOT_URL; ?>users/register">Register</a></li>
                    <li><a href="<?php echo ROOT_URL; ?>users/cart">Cart</a></li>
                    <li><a href="<?php echo ROOT_URL; ?>users/returns">Returns</a></li>
                <?php endif; ?>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>
<div class="container">

    <div class="row">
        <?php Messages::display(); ?>
        <?php require($view); ?>
    </div>

</div><!-- /.container -->
</body>
</html>