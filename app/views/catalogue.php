<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!-- Bootstrap core CSS     -->
    <link href="../../content/css/bootstrap.min.css" rel="stylesheet" />

    <!--  Light Bootstrap Table core CSS    -->
    <link href="../../content/css/light-bootstrap-dashboard.css" rel="stylesheet"/>
</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="gray">
    
    	<div class="sidebar-wrapper">
            <div class="logo">
                <a class="simple-text">
                    SOEN 343 Project
                </a>
            </div>

            <ul class="nav">
                <li>
                    <a href="user.html">
                        <i class="pe-7s-user"></i>
                        <p>Users</p>
                    </a>
                </li>
                <li>
                    <a href="catalogue.html">
                        <i class="pe-7s-note2"></i>
                        <p>Catalog</p>
                    </a>
                </li>
                <li>
                    <a href="purschases.html">
                        <i class="pe-7s-news-paper"></i>
                        <p>Transactions</p>
                    </a>
                </li>
            </ul>
    	</div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Catalog</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                           <a href="account.html">
                               Account
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Log out
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>


        <div id="page-wrapper">
            <div class="card">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Catalog</h1>
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
                                            <td>901397</td>
                                            <td>Apple's new tablet?</td>
                                            <td>a million</td>
                                            <td>50</td>
                                        </tr>
                                        <tr>
                                            <td>01497891</td>
                                            <td>Some other tablet</td>
                                            <td>less</td>
                                            <td>1</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>

                <!-- /.col-lg-6 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
            <div class= "row">                    
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            PC 
                        </div>
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
                                            <td>90139713</td>
                                            <td>Some crazy computer</td>
                                            <td>three fiddy</td>
                                            <td>2</td>
                                        </tr>
                                        <tr>
                                            <td>01497891142143</td>
                                            <td>not a crazy computer</td>
                                            <td>one fiddy</td>
                                            <td>0</td>
                                        </tr>
                                        <tr></tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
            </div>
    </div>

        <footer class="footer">
            <div class="container-fluid">
                <p class="copyright pull-right">
                    &copy; 2017
                </p>
            </div>
        </footer>

        </div>
    </div>
</div>


</body>

</html>
