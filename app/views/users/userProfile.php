 <div id="page-wrapper">
        <div id="page-wrapper">
            <div class="card">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Users</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Clients Summary Table
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">

                                <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                    <tr>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Phone Number</th>
                                        <th>Postal Code</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr class="odd gradeX">
                                        <td><input class="form-control" type = "text" value = <?php echo ucwords ($_SESSION['user_data']['firstName']); ?>></input></td>
                                        <td><input class="form-control" type = "text" value = <?php echo ucwords ($_SESSION['user_data']['lastName']); ?>></input></td>
                                        <td><input class="form-control" type = "text" value = <?php echo ucwords ($_SESSION['user_data']['email']); ?>></input></td>
                                        <td><input class="form-control" type = "text" value = <?php echo ucwords ($_SESSION['user_data']['phone']); ?>></input></td>
                                        <td><input class="form-control" type = "text" size = "6" value = <?php echo ucwords ($_SESSION['user_data']['postalCode']); ?>></input></td>
                                    </tr>
                                    <thead>
                                    <tr>
                                        <th>Street Name</th>
                                        <th>Street Number</th>
                                        <th>City</th>
                                        <th>Province</th>
                                        <th>Country</th>

                                    </tr>
                                    <thead>
                                    <tr class="even gradeC">
                                        <td><input class="form-control" type = "text" size = "4" value = <?php echo ucwords ($_SESSION['user_data']['streetNum']); ?>></input></td>
                                        <td><input class="form-control" type = "text" value = <?php echo ucwords ($_SESSION['user_data']['street']); ?>></input></td>
                                        <td><input class="form-control" type = "text" value = <?php echo ucwords ($_SESSION['user_data']['city']); ?>></input></td>
                                        <td><input class="form-control" type = "text" value = <?php echo ucwords ($_SESSION['user_data']['province']); ?>></input></td>
                                        <td><input class="form-control" type = "text" value = <?php echo ucwords ($_SESSION['user_data']['country']); ?>></input></td>
                                    </tr>
                                    </tbody>
                                </table>
                                <!-- /.table-responsive -->
                                <input class="btn btn-primary" name="submit" type="submit" value="Submit"/>
                                </form>

                                <div class="well">
                                    <h4>Client Information</h4>
                                    <p>Select a client in the table above and see its specific information below.</p>
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
                                Client
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="table-responsive table-bordered">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
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
