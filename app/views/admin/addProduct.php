<html>
<head>
    <title>CompStore343</title>
    <link rel="stylesheet" href="<?php echo ROOT_PATH; ?>../../../../content/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo ROOT_PATH; ?>../../../../content/css/light-bootstrap-dashboard.css">
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
                <li><a href="<?php echo ROOT_URL; ?>">Home</a></li>
                <?php if(isset($_SESSION['is_logged_in'])) : ?>
                <?php else :?>
                    <li><a href="<?php echo ROOT_URL; ?>admin/adminlogin">Administrator</a></li>
                <?php endif; ?>

            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php if(isset($_SESSION['is_logged_in'])) : ?>
                    <li><a href="<?php echo ROOT_URL; ?>">Welcome <?php echo ucwords($_SESSION['user_data']['FirstName']); ?></a></li>
                    <li><a type="logout" href="<?php echo ROOT_URL; ?>users/logout">Logout</a></li>
                    <li><a type="profile" href="<?php echo ROOT_URL; ?>users/userProfile">View Profile</a></li>
                <?php else : ?>
                    <li><a href="<?php echo ROOT_URL; ?>/users/login">Login</a></li>
                    <li><a href="<?php echo ROOT_URL; ?>/users/register">Register</a></li>
                <?php endif; ?>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add product</h1>
                </div>
                <select>
                    <option value="volvo">Tablet</option>
                    <option value="saab">Monitor</option>
                    <option value="mercedes">Laptop</option>
                    <option value="audi">Computer</option>
                </select>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <!-- /.col-lg-6 -->
                <div class="col-lg-12">
                <div class="panel panel-default">
                        <div class="panel-heading">
                            Tablet 
                        </div>
                        <form>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive table-bordered">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Product ID</th>
                                            <th>Product Name</th>
                                            <th>Price</th>
                                            <th>Stock</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><br><input type="text" name ="productID"><br></td>
                                            <td><br><input type="text" name ="productName"><br></td>
                                            <td><br><input type="text" name ="price"><br></td>
                                            <td><br><input type="text" name ="stock"><br></td>
                                        </tr>
                                    </tbody>
                                    
                                </table>
                                <input type="submit" value="submit">
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                        </form>
                    </div>
                        
                        
                    
                <!-- /.col-lg-6 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
            
    </div>
