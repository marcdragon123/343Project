<html>
<head>
<<<<<<< HEAD
	<title>CompStore343</title>
	<link rel="stylesheet" href="<?php echo ROOT_PATH; ?>/content/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo ROOT_PATH; ?>/content/css/light-bootstrap-dashboard.css">
=======
	<title>Shareboard</title>
	<link rel="stylesheet" href="<?php echo ROOT_PATH; ?>assets/css/bootstrap.css">
	<link rel="stylesheet" href="<?php echo ROOT_PATH; ?>assets/css/style.css">
>>>>>>> f1a9167787a819c5a0b020e52c82c445c75f18aa
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
<<<<<<< HEAD
              <li><a href="<?php echo ROOT_URL; ?>">Home</a></li>
              <li><a href="<?php echo ROOT_URL;?>admin/adminLogin">Login as Administrator</a></li>
          </ul>
            <ul class="nav navbar-nav navbar-right">
            <?php if(isset($_SESSION['is_logged_in'])) : ?>
            <li><a href="<?php echo ROOT_URL; ?>">Welcome <?php echo $_SESSION['user_data']['FirstName']; ?></a></li>
=======
            <li><a href="<?php echo ROOT_URL; ?>">Home</a></li>
          </ul>

          <ul class="nav navbar-nav navbar-right">
            <?php if(isset($_SESSION['is_logged_in'])) : ?>
<<<<<<< HEAD
            <li><a href="<?php echo ROOT_URL; ?>">Welcome <?php echo $_SESSION['user_data']['name']; ?></a></li>
>>>>>>> f1a9167787a819c5a0b020e52c82c445c75f18aa
=======
            <li><a href="<?php echo ROOT_URL; ?>">Welcome <?php echo $_SESSION['user_data']['FirstName']; ?></a></li>
>>>>>>> f5a43f70e94070f97c4cd2830ddd01d7fcb309fc
            <li><a href="<?php echo ROOT_URL; ?>users/logout">Logout</a></li>
          <?php else : ?>
            <li><a href="<?php echo ROOT_URL; ?>users/login">Login</a></li>
            <li><a href="<?php echo ROOT_URL; ?>users/register">Register</a></li>
          <?php endif; ?>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">

     <div class="row">
     	<?php require($view); ?>
     </div>

    </div><!-- /.container -->
</body>
</html>