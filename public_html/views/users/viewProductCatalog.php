
<div class="text-center">
    <?php if(isset($_SESSION['is_logged_in'])):?>
    <h1>Welcome <?php echo ucwords($_SESSION['user_data']['FirstName']);?></h1>
    <?php endif; ?>
    <a class="btn btn-primary text-center" href="<?php echo ROOT_PATH;?>users/cart">View Cart</a>
    <p class="lead">Click below to browse or add new products!</p>
    <btn class="btn btn-primary text-center" id='buttonFilter' onclick="filterBTN()">Advanced Search</btn>
    <div name="filterOptions" class="well">
        <form action="" id="myInput" >
            <label class="radio-inline">
                <input type="radio" name="type" value="Laptop"> laptop
            </label>
            <label class="radio-inline">
                <input type="radio" name="type" value="Monitor"> monitor
            </label>
            <label class="radio-inline">
                <input type="radio" name="type" value="Desktop"> desktop
            </label>
            <label class="radio-inline">
                <input type="radio" name="type" value="Tablet"> tablet
            </label>
        </form>
    </div>
    <script>
/*
      var allRadios = document.getElementsByTagName('input');
      var booRadio, val;
      var x = 0;
      var y = 0;
      for(x = 0; x < allRadios.length; x++){

          allRadios[x].onclick = function() {
              if(booRadio == this){
                  this.checked = false;
                  val = null;
                  booRadio = null;
              }else{
                  booRadio = this;
                  val = this.value;
              }
          };
      }
        
      function filterBTN(){
          if (val != undefined){
              console.log("WORK YOU FUCK"+val);
              var allWells = document.getElementsByName(val);
              for (y=0;y<allWells.length;y++){
                  allWells[y].style = "display:none";
                  //right now it hides the elements we need. change it so it only changes the other elements
              }
          }
          else{
              var allWells = document.getElementsByClassName("wells");
              for (y=0;y<allWells.length; y++) {
                    allWells[y].show();
                    //this function isnt working, find a way to make things appear first
                }
            }
        } **/
    </script>
    <div>
        <?php
        foreach($viewmodel as $key => $value){
            foreach ($viewmodel[$key] as $item => $product) { ?>
                <?php echo '<div style="" class="well" name="'.$product->__get('ProductType').'">' ?>
                    <a class="btn btn-primary text-center" href="viewSpecs?ProductType=<?= $product->__get('ProductType') ?>&SerialNumber=<?= $product->__get('SerialNumber') ?>">View Product
                        Specs</a>
                    <?php echo '<table class="'.$product->__get('ProductType').'">' ?>
                        <p class='type1'><?php echo $product->__get('ProductType'); ?></p>
                        <tbody>
                        <tr><td>Brand:<?php echo $product->__get('Brand')?> </td></tr>
                        <tr><td>Model Number:<?php echo $product->__get('ModelNumber')?> </td></tr>
                        <tr><td>Price:<?php echo $product->__get('Price')?> </td></tr>
                        <tr><td>Serial Number:<?php echo $product->__get('SerialNumber')?> </td></tr>
                        <tr><td>Weight:<?php echo $product->__get('Weight')?> </td></tr>
                        </tbody>
                    </table>
                </div>
            <?php }
        }
        ?>
    </div>


