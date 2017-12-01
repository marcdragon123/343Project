

<?php if(isset($_SESSION['is_logged_in'])) : ?>
    <h1>Welcome <?php echo ucwords($_SESSION['user_data']['FirstName']);?></h1>
<?php endif; ?>
<p class="lead">Specifications of <?php echo $viewmodel->__get('Brand')?></p>

<script>


    function stillModifying(){
        var client = new XMLHttpRequest();
        client.open('GET', '<?= ROOT_URL ?>users/pingProduct?ProductType=<?= $_GET["ProductType"] ?>&SerialNumber=<?= $_GET["SerialNumber"] ?>&update=true');

        client.send();
    }

    window.onload = function(){

        $("#title").html("View Product Specs");
        $("#product").val("<?= $viewmodel->__get('ProductType'); ?>");
        $("#product").change();

        //$("#product").attr('disabled', 'disabled');
        //$("input[name='SerialNumber']").prop("disabled", "disabled");


        $("input[name='SerialNumber']").val("<?= @$viewmodel->__get('SerialNumber'); ?>");
        $("input[name='Brand']").val("<?= @$viewmodel->__get('Brand'); ?>");
        $("input[name='Price']").val("<?= @$viewmodel->__get('Price'); ?>");
        $("input[name='ModelNumber']").val("<?= @$viewmodel->__get('ModelNumber'); ?>");
        $("input[name='Weight']").val("<?= @$viewmodel->__get('Weight'); ?>");
        $("input[name='Battery']").val("<?= @$viewmodel->__get('Battery'); ?>");
        $("input[name='DisplaySize']").val("<?= @$viewmodel->__get('DisplaySize'); ?>");
        $("input[name='DisplayDimensions']").val("<?= @$viewmodel->__get('DisplayDimensions'); ?>");
        $("input[name='CPUType']").val("<?= @$viewmodel->__get('Brand'); ?>");
        $("input[name='RAMSize']").val("<?= @$viewmodel->__get('RAMSize'); ?>");
        $("input[name='CoreNumber']").val("<?= @$viewmodel->__get('CoreNumber'); ?>");
        $("input[name='HDDSize']").val("<?= @$viewmodel->__get('HDDSize'); ?>");
        $("input[name='OS']").val("<?= @$viewmodel->__get('OS'); ?>");
        $("input[name='CameraInformation']").val("<?= @$viewmodel->__get('CameraInformation'); ?>");
        $("input[name='ToucheScreenToggle']").val("<?= @$viewmodel->__get('ToucheScreenToggle'); ?>");



        setInterval(stillModifying, <?= (30*1000) ?>);

    }

</script>



                            <input class="btn btn-primary" name="delete" type="submit" value="Delete"/>

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
                                        <input type="text" placeholder="e.g. FQ2R84HEWXH8" name ="SerialNumber" pattern="[A-Z0-9]{10,45}" required></td>

                                    <td><label>Brand Name</label><br>
                                        <input type="text" placeholder="e.g. Apple, Microsoft" name ="Brand" pattern="^[a-zA-Z0-9][a-zA-Z0-9\s]*" required></td>

                                    <td><label>Price (CAD$)</label><br>
                                        <input type="text" placeholder="e.g. 999, 1299" name ="Price" pattern="^\d+(.\d{2})?$" required></td>

                                    <td><label>Battery Life (hours)</label><br>
                                        <input type="text" placeholder="e.g. 6, 8, 12" name="Battery" pattern="^[1-9][0-9]*" required></td>

                                </tr>
                                <tr>

                                    <td><label>Display Size (inches)</label><br>
                                        <input type="text" placeholder="e.g. 11, 13.3, 15.5" name ="DisplaySize" pattern="^\d+(.\d{1})?$" required><br></td>

                                    <td><label>Dimensions (cm)</label><br>
                                        <input type="text" placeholder="e.g. 22 x 28 x 1" name ="DisplayDimensions" pattern="^[1-9][0-9]*\sx\s[1-9][0-9]*\sx\s[1-9][0-9]*"required><br></td>

                                    <td><label>Weight (kg)</label><br>
                                        <input type="text" placeholder="e.g. 0.8, 1, 5" name ="Weight" pattern="^(0*[1-9][0-9]*(\.[0-9]+)?|0+\.[0-9]*[1-9][0-9]*)$" required><br></td>

                                    <td><label>Model Number</label><br>
                                        <input type="text" placeholder="e.g. MHJR56B7VC6" name ="ModelNumber" pattern="[A-Z0-9]{10,45}" required><br></td>

                                </tr>
                                <tr>

                                    <td><label>Processor Type</label><br>
                                        <input type="text" placeholder="e.g. A8, A9X" name ="CPUType" pattern="^[a-zA-Z0-9][a-zA-Z0-9\s.]*" required><br></td>

                                    <td><label>RAM Size (GB)</label><br>
                                        <input type="text" placeholder="e.g. 2, 4, 8" name ="RAMSize" pattern="^[1-9][0-9]{0,2}" required><br></td>

                                    <td><label>Number of CPU Cores</label><br>
                                        <input type="text" placeholder="e.g. 2, 4" name ="CoreNumber" pattern="^[1-9][0-9]?" required><br></td>

                                </tr>
                                <tr>

                                    <td><label>Hard Drive Size (GB)</label><br>
                                        <input type="text" placeholder="e.g. 64, 128" name="HDDSize" pattern="^[1-9][0-9]{0,3}" required><br></td>

                                    <td><label>Operating System</label><br>
                                        <input type="text" placeholder="e.g. iOS 11" name="OS" pattern="^[a-zA-Z0-9][a-zA-Z0-9\s.]*" required><br></td>

                                    <td><label>Camera Pixels (MP)</label><br>
                                        <input type="text" placeholder="e.g. 8, 10, 12" name="CameraInformation" pattern="^[1-9][0-9]?" required><br></td>

                                </tbody>
                            </table>
                            <input class="btn btn-primary" name="submit" type="submit" value="Submit"/>
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
                                        <input type="text" placeholder="e.g. FQ2R84HEWXH8" name ="SerialNumber" pattern="[A-Z0-9]{10,45}" required></td>

                                    <td><label>Brand Name</label><br>
                                        <input type="text" placeholder="e.g. Apple, Microsoft" name ="Brand" pattern="^[a-zA-Z0-9][a-zA-Z0-9\s]*" required></td>

                                    <td><label>Price (CAD$)</label><br>
                                        <input type="text" placeholder="e.g. 999, 1299" name ="Price" pattern="^\d+(.\d{2})?$" required></td>

                                    <td><label>Display Size (inches)</label><br>
                                        <input type="text" placeholder="e.g. 11, 13.3, 15.5" name ="DisplaySize" pattern="^\d+(.\d{1})?$" required><br></td>

                                </tr>
                                <tr>

                                    <td><label>Dimensions (cm)</label><br>
                                        <input type="text" placeholder="e.g. 22 x 28 x 1" name ="DisplayDimensions" pattern="^[1-9][0-9]*\sx\s[1-9][0-9]*\sx\s[1-9][0-9]*"required><br></td>

                                    <td><label>Weight (kg)</label><br>
                                        <input type="text" placeholder="e.g. 0.8, 1, 5" name ="Weight" pattern="^(0*[1-9][0-9]*(\.[0-9]+)?|0+\.[0-9]*[1-9][0-9]*)$" required><br></td>

                                    <td><label>Processor Type</label><br>
                                        <input type="text" placeholder="e.g. A8, A9X" name ="CPUType" pattern="^[a-zA-Z0-9][a-zA-Z0-9\s.]*" required><br></td>

                                    <td><label>RAM Size (GB)</label><br>
                                        <input type="text" placeholder="e.g. 2, 4, 8" name ="RAMSize" pattern="^[1-9][0-9]{0,2}" required><br></td>

                                </tr>
                                <tr>

                                    <td><label>Number of CPU Cores</label><br>
                                        <input type="text" placeholder="e.g. 2, 4" name ="CoreNumber" pattern="^[1-9][0-9]?" required><br></td>

                                    <td><label>Battery Life (hours)</label><br>
                                        <input type="text" placeholder="e.g. 6, 8, 12" name="Battery" pattern="^[1-9][0-9]*" required></td>

                                    <td><label>Operating System</label><br>
                                        <input type="text" placeholder="e.g. iOS 11" name="OS" pattern="^[a-zA-Z0-9][a-zA-Z0-9\s.]*" required><br></td>

                                    <td><label>Hard Drive Size (GB)</label><br>
                                        <input type="text" placeholder="e.g. 64, 128" name="HDDSize" pattern="^[1-9][0-9]{0,3}" required><br></td>

                                    <td><label>Camera Pixels (MP)</label><br>
                                        <input type="text" placeholder="e.g. 8, 10, 12" name="CameraInformation" pattern="^[1-9][0-9]?" required><br></td>

                                </tr>

                                <td><label>Model Number</label><br>
                                    <input type="text" placeholder="e.g. MHJR56B7VC6" name ="ModelNumber" pattern="[A-Z0-9]{10,45}" required><br></td>

                                <td><br><input type="checkbox" name="ToucheScreenToggle">
                                    <label for="touchScreen">Touch Screen</label><br></td>
                                <td><br><br></td>
                                <td><br><br></td>
                                <td><br><br></td>
                                <br>

                                </tbody>
                            </table>
                            <input class="btn btn-primary" name="submit" type="submit" value="Submit"/>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.panel-body -->
                </form>
            </div>
            <div style="display: none" id="Monitor">
                <form name="Monitor" id="22" method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive table-bordered">
                            <table class="table">
                                <tbody>
                                <tr>

                                    <td><label>Serial Number</label><br>
                                        <input type="text" placeholder="e.g. FQ2R84HEWXH8" name ="SerialNumber" pattern="[A-Z0-9]{10,45}" required></td>

                                    <td><label>Brand Name</label><br>
                                        <input type="text" placeholder="e.g. Apple, Microsoft" name ="Brand" pattern="^[a-zA-Z0-9][a-zA-Z0-9\s]*" required></td>

                                    <td><label>Price (CAD$)</label><br>
                                        <input type="text" placeholder="e.g. 999, 1299" name ="Price" pattern="^\d+(.\d{2})?$" required></td>

                                    <td><label>Display Size (inches)</label><br>
                                        <input type="text" placeholder="e.g. 11, 13.3, 15.5" name ="DisplaySize" pattern="^\d+(.\d{1})?$" required><br></td>

                                    <input type="hidden" name="ProductType" value="Monitor">

                                </tr>
                                <tr>

                                    <td><label>Weight (kg)</label><br>
                                        <input type="text" placeholder="e.g. 0.8, 1, 5" name ="Weight" pattern="^(0*[1-9][0-9]*(\.[0-9]+)?|0+\.[0-9]*[1-9][0-9]*)$" required><br></td>

                                    <td><label>Model Number</label><br>
                                        <input type="text" placeholder="e.g. MHJR56B7VC6" name ="ModelNumber" pattern="[A-Z0-9]{10,45}" required><br></td>
                                </tr>
                                <br>
                                <tr>
                                </tr>
                                </tbody>
                            </table>
                            <input class="btn btn-primary" name="submit" type="submit" value="Submit"/>
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
                                        <input type="text" placeholder="e.g. FQ2R84HEWXH8" name ="SerialNumber" pattern="[A-Z0-9]{10,45}" required></td>

                                    <td><label>Brand Name</label><br>
                                        <input type="text" placeholder="e.g. Apple, Microsoft" name ="Brand" pattern="^[a-zA-Z0-9][a-zA-Z0-9\s]*" required></td>

                                    <td><label>Price (CAD$)</label><br>
                                        <input type="text" placeholder="e.g. 999, 1299" name ="Price" pattern="^\d+(.\d{2})?$" required></td>

                                    <td><label>Processor Type</label><br>
                                        <input type="text" placeholder="e.g. A8, A9X" name ="CPUType" pattern="^[a-zA-Z0-9][a-zA-Z0-9\s.]*" required><br></td>

                                </tr>
                                <tr>

                                    <td><label>Dimensions (cm)</label><br>
                                        <input type="text" placeholder="e.g. 22 x 28 x 1" name ="DisplayDimensions" pattern="^[1-9][0-9]*\sx\s[1-9][0-9]*\sx\s[1-9][0-9]*"required><br></td>

                                    <td><label>Weight (kg)</label><br>
                                        <input type="text" placeholder="e.g. 0.8, 1, 5" name ="Weight" pattern="^(0*[1-9][0-9]*(\.[0-9]+)?|0+\.[0-9]*[1-9][0-9]*)$" required><br></td>

                                    <td><label>Hard Drive Size (GB)</label><br>
                                        <input type="text" placeholder="e.g. 64, 128" name="HDDSize" pattern="^[1-9][0-9]{0,3}" required><br></td>

                                </tr>
                                <tr>

                                    <td><label>Model Number</label><br>
                                        <input type="text" placeholder="e.g. MHJR56B7VC6" name ="ModelNumber" pattern="[A-Z0-9]{10,45}" required><br></td>

                                    <td><label>Number of CPU Cores</label><br>
                                        <input type="text" placeholder="e.g. 2, 4" name ="CoreNumber" pattern="^[1-9][0-9]?" required><br></td>

                                    <td><label>RAM Size (GB)</label><br>
                                        <input type="text" placeholder="e.g. 2, 4, 8" name ="RAMSize" pattern="^[1-9][0-9]{0,2}" required><br></td>

                                </tr>
                                </tbody>
                            </table>
                            <input class="btn btn-primary" name="submit" type="submit" value="Submit"/>
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
<?php
$edit = true;
?>

