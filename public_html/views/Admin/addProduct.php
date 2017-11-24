<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#product').on('change', function() {
                if(this.value === "Tablet"){
                    $("#Tablet").show();
                } else {
                    $("#Tablet").hide();
                }
                if(this.value === "Monitor"){
                    $("#Monitor").show();
                } else {
                    $("#Monitor").hide();
                }
                if(this.value === "Laptop"){
                    $("#Laptop").show();
                } else {
                    $("#Laptop").hide();
                }
                if(this.value === "Desktop"){
                    $("#Desktop").show();
                } else {
                    $("#Desktop").hide();
                }
            });
        });
    </script>
</head>
<body>
<div class="panel panel-default" id="page-wrapper">
    <div class="panel-heading">
        <h3>Add Product</h3>
        <div class="row">
            <select name="productType" id="product">
                <option value="" disabled="disabled" selected="selected">Choose Product to Enter</option>
                <option value="Tablet">Tablet</option>
                <option value="Monitor">Monitor</option>
                <option value="Laptop">Laptop</option>
                <option value="Desktop">Desktop</option>
            </select>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.col-lg-6 -->
        <div class="panel panel-default">
            <div style="display: none" id="Tablet">
                <form name="Tablet" id="11" method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive table-bordered">
                            <table class="table">
                                <tbody>
                                <tr>

                                    <input type="hidden" name="ProductType" value="Tablet">

                                    <td><label>Serial Number</label><br>
                                    <input type="text" placeholder="e.g FQ2R84HEWXH8" name ="SerialNumber" pattern="([a-zA-Z0-9]{1,45})" required></td>
                                    
                                    <td><label>Brand Name</label><br>
                                    <input type="text" placeholder="e.g. Apple, Microsoft" name ="Brand" pattern="([a-zA-Z0-9]{1,45})" required></td>

                                    <td><label>Price</label><br>
                                    <input type="text" placeholder="e.g. $999, $1299" name ="Price" pattern="(\d{4}|\d{3}|\d{2})+[.]+(\d{2})" required></td>

                                    <td><label>Battery Life</label><br>
                                    <input type="text" placeholder="e.g. 6 hours, 8 hours" name="Battery" pattern="[A-Za-z]{1,45}" required></td>

                                </tr>
                                <tr>

                                    <td><label>Display Size (inches)</label><br>
                                    <input type="text" placeholder="e.g. 7&quot;, 11&quot;" name ="DisplaySize" pattern="[0-9]{1,11}" required><br></td>
                                    
                                    <td><label>Dimensions (cm)</label><br>
                                    <input type="text" placeholder="e.g. 22 x 28 x 1" name ="Dimensions" pattern="[A-Za-z]{1,10}" required><br></td>
                                    
                                    <td><label>Weight (kg)</label><br>
                                    <input type="text" placeholder="e.g. 0.8 kg, 1 kg" name ="Weight" pattern="(\d{2})+[.]+(\d{2})" required><br></td>
                                    
                                    <td><label>Model Number</label><br>
                                    <input type="text" placeholder="e.g. MHJR5VC6" name ="ModelNumber" pattern="[A-Za-z0-9]{1,45}" required><br></td>
                                
                                </tr>
                                <tr>

                                    <td><label>Processor Type</label><br>
                                    <input type="text" placeholder="e.g. A8, A9X" name ="CPUType" pattern="[A-Za-z]{1,45}" required><br></td>
                                    
                                    <td><label>RAM Size</label><br>
                                    <input type="text" placeholder="e.g. 2GB, 3GB" name ="RAMSize" pattern="[0-9]{1,11}" required><br></td>
                                    
                                    <td><label>Number of CPU Cores</label><br>
                                    <input type="text" placeholder="e.g. 2, 4" name ="CoreNumber" pattern="[0-9]{1,11}" required><br></td>

                                </tr>
                                <tr>

                                    <td><label>Hard Drive Size</label><br>    
                                    <input type="text" placeholder="e.g. 64GB, 128GB" name="HDDSize" pattern="[0-9]{1,11}" required><br></td>
                                    
                                    <td><label>Operating System</label><br>
                                    <input type="text" placeholder="e.g. iOS 11" name="OS" pattern="[A-Za-z0-9]{1,45}" required><br></td>
                                    
                                    <td><label>Camera Pixels</label><br>
                                    <input type="text" placeholder="e.g. 10 megapixels" name="CameraInformation" pattern="[A-Za-z0-9]{1,45}" required><br></td>

                                </tbody>
                            </table>
                            <input class="btn btn-primary" name="Tablet" type="submit" value="Submit"/>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.panel-body -->
                </form>
            </div>
            <div style="display: none" id="Laptop">
                <form name="Laptop" id="33" method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive table-bordered">
                            <table class="table">
                                <tbody>
                                <tr>

                                    <input type="hidden" name="ProductType" value="Laptop">

                                    <td><label>Serial Number</label><br>
                                    <input type="text" placeholder="e.g. FQ2R84HEWXH8" name ="SerialNumber" pattern="([a-zA-Z0-9]{1,45})" required><br></td>

                                    <td><label>Brand Name</label><br>
                                    <input type="text" placeholder="e.g. Apple, Microsoft" name ="Brand" pattern="([a-zA-Z0-9]{1,45})" required><br></td>

                                    <td><label>Price</label><br>
                                    <input type="text" placeholder="e.g. $999, $1299" name ="Price" pattern="(\d{4}|\d{3}|\d{2}|d{1})+[.]+(\d{2})" required><br></td>

                                    <td><label>Display Size (inches)</label><br>
                                    <input type="text" placeholder="e.g. 13&quot;, 15&quot;" name ="DisplaySize" pattern="(\d{1}|\d{2})" required><br></td>

                                </tr>
                                <tr>

                                    <td><label>Dimensions (cm)</label><br>
                                    <input type="text" placeholder="e.g. 17 x 25 x 1" name ="Dimensions" pattern="[A-Za-z]{1,10}" required><br></td>

                                    <td><label>Weight (kg)</label><br>
                                    <input type="text" placeholder="Weight (kg)" name ="Weight" pattern="(\d{2})+[.]+(\d{2})"required><br></td>

                                    <td><label>Processor Type</label><br>
                                    <input type="text" placeholder="e.g. 2.6 GHz Intel Core i5" name ="CPUType" pattern="[A-Za-z]{1,45}"required><br></td>

                                    <td><label>RAM Size</label><br>
                                    <input type="text" placeholder="e.g. 8GB, 16GB" name ="RAMSize" pattern="[0-9]{1,11}"required><br></td>    

                                </tr>
                                <tr>

                                    <td><label>Number of CPU Cores</label><br>
                                    <input type="text" placeholder="e.g. 4, 8" name ="CoreNumber" pattern="[0-9]{1,11}"required><br></td>

                                    <td><label>Battery Life</label><br>
                                    <input type="text" placeholder="e.g. 6 hours, 8 hours" name="Battery" pattern="[A-Za-z]{1,45}" required><br></td>

                                    <td><label>Operating System</label><br>
                                    <input type="text" placeholder="e.g. Mac OS X, Windows 10" name="OS" pattern="[A-Za-z]{1,45}"required><br></td>

                                    <td><label>Hard Drive Size</label><br>
                                    <input type="text" placeholder="e.g. 256 GB, 512 GB" name="HDDSize" pattern="[0-9]{1,11}"required><br></td>

                                    <td><label>Camera Information</label><br>
                                    <input type="text" placeholder="e.g. 4 MP, 6 MP" name="CameraInformation" pattern="[A-Za-z0-9]{1,45}"required><br></td>

                                </tr>

                                <td><label>Model Number</label><br>
                                    <input type="text" placeholder="e.g. MHJR5VC6" name ="ModelNumber" pattern="[A-Za-z0-9]{1,45}" required><br></td>

                                <td><br><input type="checkbox" name="ToucheScreenToggle">
                                    <label for="touchScreen">Touch Screen</label><br></td>
                                <td><br><br></td>
                                <td><br><br></td>
                                <td><br><br></td>
                                <br>

                                </tbody>
                            </table>
                            <input class="btn btn-primary" name="Laptop" type="submit" value="Submit"/>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.panel-body -->
                </form>
            </div>
            <div style="display: none" id="Monitor">
                <form name=Monitor id="22" method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive table-bordered">
                            <table class="table">
                                <tbody>
                                <tr>

                                    <td><label>Serial Number</label><br>
                                    <input type="text" placeholder="e.g. FQ2R84HEWXH8" name ="SerialNumber" pattern="([a-zA-Z0-9]{1,45})" required><br></td>

                                    <td><label>Brand Name</label><br>
                                    <input type="text" placeholder="e.g. Apple, Microsoft" name ="Brand" pattern="([a-zA-Z0-9]{1,45})" required><br></td>

                                    <td><label>Price</label><br>
                                    <input type="text" placeholder="e.g. $999, $1299" name ="Price" pattern="(\d{4}|\d{3}|\d{2}|d{1})+[.]+(\d{2})" required><br></td>

                                    <td><label>Display Size (inches)</label><br>
                                    <input type="text" placeholder="e.g. 13&quot;, 15&quot;" name ="DisplaySize" pattern="(\d{1}|\d{2})" required><br></td>

                                    <input type="hidden" name="ProductType" value="Monitor">

                                </tr>
                                <tr>

                                    <td><label>Weight (kg)</label><br>
                                    <input type="text" placeholder="e.g. 0.8 kg, 1 kg" name ="Weight" pattern="(\d{2})+[.]+(\d{2})" required><br></td>
                                    
                                    <td><label>Model Number</label><br>
                                    <input type="text" placeholder="e.g. MHJR5VC6" name ="ModelNumber" pattern="[A-Za-z0-9]{1,45}" required><br></td>

                                </tr>
                                <br>
                                <tr>
                                </tr>
                                </tbody>
                            </table>
                            <input class="btn btn-primary" name="Monitor" type="submit" value="Submit"/>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.panel-body -->
                </form>
            </div>
            <div style="display: none" id="Desktop">
                <form name="Desktop" id="44" method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive table-bordered">
                            <table class="table">
                                <tbody>
                                <tr>

                                    <input type="hidden" name="ProductType" value="Desktop">

                                    <td><label>Serial Number</label><br>
                                    <input type="text" placeholder="e.g. FQ2R84HEWXH8" name ="SerialNumber" pattern="([a-zA-Z0-9]{1,45})" required><br></td>

                                    <td><label>Brand Name</label><br>
                                    <input type="text" placeholder="e.g. Apple, Microsoft" name ="Brand" pattern="([a-zA-Z0-9]{1,45})" required><br></td>

                                    <td><label>Price</label><br>
                                    <input type="text" placeholder="e.g. $999, $1299" name ="Price" pattern="(\d{4}|\d{3}|\d{2}|d{1})+[.]+(\d{2})" required><br></td>

                                    <td><label>Processor Type</label><br>
                                    <input type="text" placeholder="e.g. 2.6 GHz Intel Core i5" name ="CPUType" pattern="[A-Za-z]{1,45}"required><br></td>

                                </tr>
                                <tr>

                                    <td><label>Dimensions (cm)</label><br>
                                    <input type="text" placeholder="e.g. 17 x 25 x 1" name ="Dimensions" pattern="[A-Za-z]{1,10}" required><br></td>

                                    <td><label>Weight (kg)</label><br>
                                    <input type="text" placeholder="Weight (kg)" name ="Weight" pattern="(\d{2})+[.]+(\d{2})"required><br></td>

                                    <td><label>Hard Drive Size</label><br>
                                    <input type="text" placeholder="e.g. 256 GB, 512 GB" name="HDDSize" pattern="[0-9]{1,11}"required><br></td>

                                </tr>
                                <tr>

                                    <td><label>Model Number</label><br>
                                    <input type="text" placeholder="e.g. MHJR5VC6" name ="ModelNumber" pattern="[A-Za-z0-9]{1,45}" required><br></td>

                                    <td><label>Number of CPU Cores</label><br>
                                    <input type="text" placeholder="e.g. 4, 8" name ="CoreNumber" pattern="[0-9]{1,11}"required><br></td>

                                    <td><label>RAM Size</label><br>
                                    <input type="text" placeholder="e.g. 8GB, 16GB" name ="RAMSize" pattern="[0-9]{1,11}"required><br></td>    

                                </tr>
                                </tbody>
                            </table>
                            <input class="btn btn-primary" name="Desktop" type="submit" value="Submit"/>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.panel-body -->
                </form>
            </div>
        </div>
    </div>
</div>
</body>
