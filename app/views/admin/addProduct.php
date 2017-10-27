<html>
<head>
    <title>CompStore343</title>
    <link rel="stylesheet" href="<?php echo ROOT_PATH; ?>../../../../content/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo ROOT_PATH; ?>../../../../content/css/light-bootstrap-dashboard.css">
</head>
<body>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add product</h1>
                </div>
                <select id="dropdown">
                    <option value="1">Tablet</option>
                    <option value="2">Monitor</option>
                    <option value="3">Laptop</option>
                    <option value="4">Computer</option>
                </select>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
               
                    <div class="panel panel-default">
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <!-- /.col-lg-6 -->
                
                <div class="panel panel-default">
                    <div class="choice" id="1" >Tablet</div>
                    <div class="choice" id="2">Monitor</div>
                    <div class="choice" id="3">Laptop</div>
                    <div class="choice" id="4">Desktop Computer</div>
                        <form id="11">
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive table-bordered">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Model Number</th>
                                            <th>Product Name</th>
                                            <th>Price</th>
                                            <th>Brand Name</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><br><input type="text" name ="modelNumber"><br></td>
                                            <td><br><input type="text" name ="productName"><br></td>
                                            <td><br><input type="text" name ="price"><br></td>
                                            <td><br><input type="text" name ="stock"><br></td>
                                        </tr>
                                    </tbody>
                                    <thead>
                                        <tr>
                                            <th>Display size</th>
                                            <th>detailed dimensions</th>
                                            <th>weight</th>
                                            <th>Processor type</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <td><br><input type="text" name="Display size"><br></td>
                                        <td><br><input type="text" name ="detailedDimensions"><br></td>
                                        <td><br><input type="text" name="weight"><td><br><input type="text" name="processorType"><br></td>
                                    </tbody>
                                     <thead>
                                        <tr>
                                            <th>RAM size</th>
                                            <th>Number of CPU cores</th>
                                            <th>Hard drive size</th>
                                            <th>battery information</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <td><br><input type="text" name = "ramSize"><br></td>
                                        <td><br><input type="text" name="numberOfCpus"><br></td>
                                        <td><br><input type="text" name="harddrive"><br></td>
                                        <td><br><input type="text" name="battery"><br></td>
                                    </tbody>
                                      <thead>
                                        <tr>
                                            <th>Operating System</th>
                                            <th>Camera information</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <td><br><input type="text" name="operatingSystem"><br></td>
                                        <td><br><input type="text" name="cameraInfo"><br></td>
                                    </tbody>
                                </table>
                                <input type="submit" value="submit">
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                        </form>
                    
                    <form id="33">
                        <div class="panel-body">
                            <div class="table-responsive table-bordered">
                        <table>
                            <thead>
                                <tr>
                                    <th>Model Number</th>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Brand Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                <td><br><input type="text" name="modelNumber"><br></td>
                                <td><br><input type="text" name="productName"><br></td>
                                <td><br><input type="text" name="Price"><br></td>
                                <td><br><input type="text" name="brandName"><br></td>
                            </tbody>
                            <thead>
                                <tr>
                                    <th>Display size</th>
                                    <th>Processor type</th>
                                    <th>RAM size</th>
                                    <th>Weight</th>
                                </tr>
                            </thead>
                            <tbody>
                                <td><br><input type="text" name="displaySize"><br></td>
                                <td><br><input type="text" name="processorType"><br></td>
                                <td><br><input type="text" name="RAMsize"><br></td>
                                <td><br><input type="text" name="weight"><br></td>
                            </tbody>
                            <thead>
                                <tr>
                                    <th>Number of CPU cores</th>
                                    <th>hard drive Size</th>
                                    <th>Battery Information</th>
                                    <th>Operating System</th>
                                </tr>
                            </thead>
                            <tbody>
                                <td><br><input type="text" name="numberCPUs"><br></td>
                                <td><br><input type="text" name="hardDriveSize"><br></td>
                                <td><br><input type="text" name="batteryInfo"><br></td>
                                <td><br><input type="text" name="operatingSystem"><br></td>
                            </tbody>
                            <thead>
                                <tr>
                                    <th>HasCamera</th>
                                    <th>IsTouchScreen</th>
                                </tr>
                            </thead>
                            <tbody>
                                <td><br><input type="checkbox" name="hasCamera"><br></td>
                                <td><br><input type="checkbox" name="isTouchScreen"><br></td>
                            </tbody>
                        </table>
                                <input type="submit" value="submit">
                            </div></div>
                    </form>
                    
                    <form id="22">
                        <div class="panel-body">
                            <div class="table-responsive table-bordered">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Model Number</th>
                                            <th>Product Name</th>
                                            <th>Price</th>
                                            <th>Brand Name</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <td><br><input type="text" name ="modelNumber"><br></td>
                                        <td><br><input type="text" name ="productName"><br></td>
                                        <td><br><input type="text" name ="price"><br></td>
                                        <td><br><input type="text" name ="brandName"><br></td>
                                    </tbody>
                                    <thead>
                                        <tr>
                                            <th>Weight</th>
                                            <th>Display size</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <td><br><input type="text" name ="weight"><br></td>
                                        <td><br><input type="text" name ="displaySize"><br></td>
                                    </tbody>
                                </table>
                                <input type="submit" value="submit">
                            </div>
                        </div>
                    </form>
                    
                    <form id="44">
                        <div class="panel-body">
                            <div class="table-responsive table-bordered">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Model Number</th>
                                            <th>Product Name</th>
                                            <th>Price</th>
                                            <th>Brand Name</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <td><br><input type="text" name="modelNumber"><br></td>
                                        <td><br><input type="text" name="productName"><br></td>
                                        <td><br><input type="text" name="price"><br></td>
                                        <td><br><input type="text" name="brandName"><br></td>
                                    </tbody>
                                    <thead>
                                        <tr>
                                            <th>Detailed Dimensions</th>
                                            <th>Processor Type</th>
                                            <th>RAM size</th>
                                            <th>Weight</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <td><br><input type="text" name="detailedDimensions"><br></td>
                                        <td><br><input type="text" name="processorType"><br></td>
                                        <td><br><input type="text" name="RAMsize"><br></td>
                                        <td><br><input type="text" name="weight"><br></td>
                                    </tbody>
                                    <thead>
                                        <tr>
                                            <th>Number of CPU cores</th>
                                            <th>hard drive size</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <td><br><input type="text" name="numberCPUs"><br></td>
                                        <td><br><input type="text" name="hardDriveSize"><br></td>
                                    </tbody>
                                </table>
                                <input type="submit" value="submit">
                            </div>
                        </div>
                    </form>
                    
                </div>
                        
                        
                    
                <!-- /.col-lg-6 -->
            
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
            
    </div>      
</body>
