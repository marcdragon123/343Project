<html>
<head>
    <meta charset="utf-8" />
    <!--<link rel="icon" type="image/png" href="assets/img/favicon.ico">-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!-- Bootstrap core CSS     -->
    <link href="content/css/bootstrap.min.css" rel="stylesheet" />

    <!--  Light Bootstrap Table core CSS    -->
    <link href="content/css/light-bootstrap-dashboard.css" rel="stylesheet"/>
</head>
</html>

<div class="text-center">
	<h1>Welcome <?php echo ucwords($_SESSION['user_data']['FirstName']);?></h1>
	<p class="lead">Click below to browse or add new products!</p>
	<a class="btn btn-primary text-center" href="<?php echo ROOT_PATH;?>views/admin/addProduct">Add New Products</a>
    <a class="btn btn-primary text-center" href="<?php echo ROOT_PATH;?>/views/admin/adminCatalog">View Products Catalog</a>
    <div>
        <?php if(isset($_SESSION['is_logged_in'])) : ?>
        <?php endif; ?>
        <?php foreach($viewmodel as $item) : ?>
            <div class="well">
                <h3><?php echo $item['FirstName']; ?></h3>
                <small><?php echo $item['LastName']; ?></small>
                <hr />
                <p><?php echo $item['Email']; ?></p>
                <br />
                <a class="btn btn-default" href="<?php echo $item['ID']; ?>" target="_blank">Go To Website</a>
            </div>
        <?php endforeach; ?>
    </div>
</div>