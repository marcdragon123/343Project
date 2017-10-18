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
                    <a class="navbar-brand" href="#">Transactions</a>
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
                    <h1 class="page-header">Transactions</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Transaction Summary Table
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Purchase ID</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Client ID</th>
                                        <th>Client Name</th>
                                        <th>Price</th>
                                        <th>Paid</th>
                                        <th>Transaction Type</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="odd gradeX">
                                        <td>0001</td>
                                        <td>01/01/2016</td>
                                        <td>4:00 pm</td>
                                        <td>1111</td>
                                        <td class="center">George Theophanous</td>
                                        <td class="center">100.00$</td>
                                        <td>Yes</td>
                                        <td>Purchase</td>
                                    </tr>
                                    <tr class="even gradeC">
                                        <td>0002</td>
                                        <td>02/01/2016</td>
                                        <td>5:00 am</td>
                                        <td>2222</td>
                                        <td class="center">Roy Saliba</td>
                                        <td class="center">320.00$</td>
                                        <td>No</td>
                                        <td>Return</td>
                                    </tr>
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                            <div class="well">
                                <h4>Transaction Information</h4>
                                <p>Select a transaction in the table above and see its specific information below.</p>
                            </div>
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
                            Transaction 0001
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive table-bordered">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Cart Element</th>
                                            <th>Product Name</th>
                                            <th>Product ID</th>
                                            <th>Quantity</th>
                                            <th>Total Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>LG series 500 computer screen</td>
                                            <td>55555</td>
                                            <td>2</td>
                                            <td>65.00$</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>mouspad</td>
                                            <td>22222</td>
                                            <td>1</td>
                                            <td>5.00$</td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>steelseries sensei1 mouse</td>
                                            <td>99999</td>
                                            <td>1</td>
                                            <td>30.00$</td>
                                        </tr>
                                        <tr>
                                            <td>Total</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>100.00$</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
            </div>
            <!-- /.row -->
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


</body>
</html>
