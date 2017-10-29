<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $('#product').on('change', function() {
            if(this.value === "tablet"){
                $("#tablet").show();
            } else {
                $("#tablet").hide();
            }
            if(this.value === "monitor"){
                $("#monitor").show();
            } else {
                $("#monitor").hide();
            }
            if(this.value === "laptop"){
                $("#laptop").show();
            } else {
                $("#laptop").hide();
            }
            if(this.value === "desktop"){
                $("#desktop").show();
            } else {
                $("#desktop").hide();
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
             <option value="tablet">Tablet</option>
             <option value="monitor">Monitor</option>
             <option value="laptop">Laptop</option>
             <option value="destop">Desktop</option>
         </select>
         <!-- /.col-lg-12 -->
     </div>
         <!-- /.col-lg-6 -->
         <div class="panel panel-default">
             <div style="display: none" id="tablet">
             <form name="tablet" id="11" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
                 <!-- /.panel-heading -->
                 <div class="panel-body">
                     <div class="table-responsive table-bordered">
                         <table class="table">
                             <tbody>
                             <tr>
                                 <td><br><input type="text" placeholder="Model Number" name ="serialNum"><br></td>
                                 <td><br><input type="text" placeholder="Product Name" name ="productName"><br></td>
                                 <td><br><input type="text" placeholder="Brand Name" name ="brandName"><br></td>
                                 <td><br><input type="text" placeholder="Price" name ="price"><br></td>
                             </tr>
                             <tr>
                                 <td><br><input type="text" placeholder="Display Size (inches)" name ="display"><br></td>
                                 <td><br><input type="text" placeholder="Length (cm)" name ="length"><br></td>
                                 <td><br><input type="text" placeholder="Width (cm)" name ="width"><br></td>
                                 <td><br><input type="text" placeholder="Height (cm)" name ="height"><br></td>
                             </tr>
                             <tr>
                                 <td><br><input type="text" placeholder="Weight (kg)" name ="weight"><br></td>
                                 <td><br><input type="text" placeholder="Processor Type" name ="processor"><br></td>
                                 <td><br><input type="text" placeholder="Ram Size" name ="ram"><br></td>
                                 <td><br><input type="text" placeholder="CPU" name ="cpu"><br></td>
                             </tr>
                                <td><br><input type="text" placeholder="Hard Drive" name="harddrive"><br></td>
                                <td><br><input type="text" placeholder="Battery Life" name="battery"><br></td>
                                <td><br><input type="text" placeholder="Operating System" name="os"><br></td>
                                <td><br><input type="text" placeholder="Camera Pixels" name="cam"><br></td>
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
             <div style="display: none" id="laptop">
             <form name="laptop" id="33" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
                 <!-- /.panel-heading -->
                 <div class="panel-body">
                     <div class="table-responsive table-bordered">
                         <table class="table">
                             <tbody>
                             <tr>
                                 <td><br><input type="text" placeholder="Model Number" name ="serialNum"><br></td>
                                 <td><br><input type="text" placeholder="Product Name" name ="productName"><br></td>
                                 <td><br><input type="text" placeholder="Brand Name" name ="brandName"><br></td>
                                 <td><br><input type="text" placeholder="Price" name ="price"><br></td>
                             </tr>
                             <tr>
                                 <td><br><input type="text" placeholder="Display Size (inches)" name ="display"><br></td>
                                 <td><br><input type="text" placeholder="Weight (kg)" name ="weight"><br></td>
                                 <td><br><input type="text" placeholder="Processor Type" name ="processor"><br></td>
                                 <td><br><input type="text" placeholder="Ram Size" name ="ram"><br></td>
                             </tr>
                             <tr>
                                 <td><br><input type="text" placeholder="CPU" name ="cpu"><br></td>
                                 <td><br><input type="text" placeholder="Battery Life" name="battery"><br></td>
                                 <td><br><input type="text" placeholder="Operating System" name="os"><br></td>
                                 <td><br><input type="text" placeholder="Camera Pixels" name="cam"><br></td>
                             </tr>
                                <td><br><input type="text" placeholder="Hard Drive" name="harddrive"><br></td>
                                <td><br><input type="checkbox" placeholder="Has Camera" name="hasCamera">
                                    <label for="hasCamera">Has Camera</label><br></td>
                                <td><br><input type="checkbox" name="touchScreen">
                                    <label for="touchScreen">Touch Screen</label><br></td>
                             <br></td>
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
             <div style="display: none" id="monitor">
             <form name="monitor" id="22" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
                 <!-- /.panel-heading -->
                 <div class="panel-body">
                     <div class="table-responsive table-bordered">
                         <table class="table">
                             <tbody>
                             <tr>
                                 <td><br><input type="text" placeholder="Model Number" name ="serialNum"><br></td>
                                 <td><br><input type="text" placeholder="Product Name" name ="productName"><br></td>
                                 <td><br><input type="text" placeholder="Brand Name" name ="brandName"><br></td>
                                 <td><br><input type="text" placeholder="Price" name ="price"><br></td>
                             </tr>
                             <tr>
                                 <td><br><input type="text" placeholder="Display Size (inches)" name ="display"><br></td>
                                 <td><br><input type="text" placeholder="Weight (kg)" name ="weight"><br></td>
                             </tr>
                             <br></td>
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
             <div style="display: none" id="desktop">
             <form name="desktop" id="44" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
                 <!-- /.panel-heading -->
                 <div class="panel-body">
                     <div class="table-responsive table-bordered">
                         <table class="table">
                             <tbody>
                             <tr>
                                 <td><br><input type="text" placeholder="Model Number" name ="serialNum"><br></td>
                                 <td><br><input type="text" placeholder="Product Name" name ="productName"><br></td>
                                 <td><br><input type="text" placeholder="Brand Name" name ="brandName"><br></td>
                                 <td><br><input type="text" placeholder="Price" name ="price"><br></td>
                             </tr>
                             <tr>
                                 <td><br><input type="text" placeholder="Length (cm)" name ="length"><br></td>
                                 <td><br><input type="text" placeholder="Width (cm)" name ="width"><br></td>
                                 <td><br><input type="text" placeholder="Height (cm)" name ="height"><br></td>
                                 <td><br><input type="text" placeholder="Weight (kg)" name ="weight"><br></td>
                             </tr>
                             <tr>
                                 <td><br><input type="text" placeholder="Hard Drive" name="harddrive"><br></td>
                                 <td><br><input type="text" placeholder="Processor Type" name ="processor"><br></td>
                                 <td><br><input type="text" placeholder="Ram Size" name ="ram"><br></td>
                                 <td><br><input type="text" placeholder="CPU" name ="cpu"><br></td>
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
