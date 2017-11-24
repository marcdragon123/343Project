
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
<div class="panel panel-default" id="page-wrapper">
    <div class="panel-heading">
        <h3 id="title">Add Product</h3>
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
                                    <td><br><input type="text" placeholder="Serial Number" name ="SerialNumber" pattern="[A-Za-z]{1,45}" required><br></td>
                                    <td><br><input type="text" placeholder="Brand Name" name ="Brand" pattern="[A-Za-z]{1,45}" required><br></td>
                                    <td><br><input type="text" placeholder="Price" name ="Price" pattern="(\d{4}|\d{3}|\d{2})+[.]+(\d{2})" required><br></td>
                                    <td><br><input type="text" placeholder="Battery Life" name="Battery" pattern="[A-Za-z]{1,45}" required><br></td>

                                </tr>
                                <tr>
                                    <td><br><input type="text" placeholder="Display Size (inches)" name ="DisplaySize" pattern="[0-9]{1,11}" required><br></td>
                                    <td><br><input type="text" placeholder="Display Dimensions" name ="DisplayDimensions" pattern="[A-Za-z]{1,10}" required><br></td>
                                    <td><br><input type="text" placeholder="Weight (kg)" name ="Weight" pattern="(\d{2})+[.]+(\d{2})" required><br></td>
                                    <td><br><input type="text" placeholder="Model Number" name ="ModelNumber" pattern="[A-Za-z]{1,45}" required><br></td>
                                </tr>
                                <tr>
                                    <td><br><input type="text" placeholder="Processor Type" name ="CPUType" pattern="[A-Za-z]{1,45}" required><br></td>
                                    <td><br><input type="text" placeholder="Ram Size" name ="RAMSize" pattern="[0-9]{1,11}" required><br></td>
                                    <td><br><input type="text" placeholder="Number Of CPU Cores" name ="$CoreNumber" pattern="[0-9]{1,11}" required><br></td>
                                    <td><br><td><br><input type="hidden" name="ProductType" value="Tablet" <br></td><br></td>
                                </tr>
                                <td><br><input type="text" placeholder="Hard Drive Size" name="HDDSize" pattern="[0-9]{1,11}" required><br></td>
                                <td><br><input type="text" placeholder="Operating System" name="OS" pattern="[A-Za-z]{1,45}" required><br></td>
                                <td><br><input type="text" placeholder="Camera Pixels" name="CameraInformation" pattern="[A-Za-z]{1,45}" required><br></td>
                                <td><br><br></td>
                                <tr>
                                </tr>
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
                                    <td><br><input type="text" placeholder="Serial Number" name ="SerialNumber" pattern="[A-Za-z]{1,45}" required><br></td>
                                    <td><br><input type="text" placeholder="Brand Name" name ="Brand" pattern="[A-Za-z]{1,45}" required><br></td>
                                    <td><br><input type="text" placeholder="Price" name ="Price" pattern="(\d{4}|\d{3}|\d{2})+[.]+(\d{2})" required><br></td>
                                    <td><br><input type="text" placeholder="Display Size (inches)" name ="DisplaySize" pattern="[0-9]{1,11}" required><br></td>
                                </tr>
                                <tr>
                                    <td><br><input type="text" placeholder="Display Dimensions" name ="DisplayDimensions" pattern="[A-Za-z]{1,10}" required><br></td>
                                    <td><br><input type="text" placeholder="Weight (kg)" name ="Weight" pattern="(\d{2})+[.]+(\d{2})"required><br></td>
                                    <td><br><input type="text" placeholder="Processor Type" name ="CPUType" pattern="[A-Za-z]{1,45}"required><br></td>
                                    <td><br><input type="text" placeholder="Ram Size" name ="RAMSize" pattern="[0-9]{1,11}"required><br></td>    
                                </tr>
                                <tr>
                                    <td><br><input type="text" placeholder="Number of CPU Cores" name ="$CoreNumber" pattern="[0-9]{1,11}"required><br></td>
                                    <td><br><input type="text" placeholder="Battery Life" name="Battery" pattern="[A-Za-z]{1,45}" required><br></td>
                                    <td><br><input type="text" placeholder="Operating System" name="OS" pattern="[A-Za-z]{1,45}"required><br></td>
                                    <td><br><input type="text" placeholder="Hard Drive" name="HDDSize" pattern="[0-9]{1,11}"required><br></td>
                                    <td><br><input type="text" placeholder="Camera Information" name="CameraInformation" pattern="[A-Za-z]{1,45}"required><br></td>
                                </tr>
                                <td><br><input type="text" placeholder="Model Number" name ="ModelNumber" required><br></td>

                                <td><br><input type="checkbox" name="ToucheScreenToggle">
                                    <label for="touchScreen">Touch Screen</label><br></td>
                                <td><br><td><br><input type="hidden" name="ProductType" value="Laptop" ><br></td><br></td>
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
                                    <td><br><input type="text" placeholder="Serial Number" name ="SerialNumber" required><br></td>
                                    <td><br><input type="text" placeholder="Brand Name" name ="Brand"  required><br></td>
                                    <td><br><input type="text" placeholder="Price" name ="Price"  required><br></td>
                                    <td><br><input type="text" placeholder="Display Size (inches)" name ="DisplaySize" ><br></td>
                                </tr>
                                <tr>
                                    <td><br><input type="text" placeholder="Weight (kg)" name ="Weight"  required><br></td>
                                    <td><br><input type="text" placeholder="Model Number" name ="ModelNumber" required><br></td>
                                    <td><br><input type="hidden" name="ProductType" value="Monitor"><br></td>
                                    <td><br><br></td>
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
                                    <td><br><input type="text" placeholder="Serial Number" name ="SerialNumber" pattern="[A-Za-z]{1,45}" required><br></td>
                                    <td><br><input type="text" placeholder="Brand Name" name ="Brand" pattern="[A-Za-z]{1,45}" required><br></td>
                                    <td><br><input type="text" placeholder="Price" name ="Price" pattern="(\d{4}|\d{3}|\d{2})+[.]+(\d{2})" required><br></td>
                                    <td><br><input type="text" placeholder="CPU Type" name ="CPUType" pattern="[A-Za-z]{1,45}" required><br></td>
                                </tr>
                                <tr>
                                    <td><br><input type="text" placeholder="Length (cm)" name ="Dimensions" pattern="[A-Za-z]{1,10}" required><br></td>
                                    <td><br><input type="text" placeholder="Weight (kg)" name ="Weight" pattern="(\d{2})+[.]+(\d{2})" required><br></td>
                                    <td><br><input type="text" placeholder="Hard Drive" name="HDDSize" pattern="[0-9]{1,11}" required><br></td>
                                    <td><br><input type="hidden" name="ProductType" value="Desktop" <br><br></td>
                                </tr>
                                <tr>
                                    <td><br><input type="text" placeholder="Model Number" name ="ModelNumber" pattern="[A-Za-z]{1,45}" required><br></td>
                                    <td><br><input type="text" placeholder="Number of CPU Cores" name ="CoreNumber" pattern="[0-9]{1,11}" required><br></td>
                                    <td><br><input type="text" placeholder="Ram Size" name ="RAMSize" pattern="[0-9]{1,11}" required><br></td>
                                    <td><br><br></td>
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
