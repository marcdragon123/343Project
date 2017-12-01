<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<div class="text-center">
    <?php if(isset($_SESSION['is_logged_in'])):?>
        <h1>Welcome <?php echo ucwords($_SESSION['user_data']['FirstName']);?></h1>
    <?php endif; ?>
    <div name="filterOptions" class="well">
        <select name="productType" id="product">
            <option value="" selected>Show all products</option>
            <option value="Tablet">Tablet</option>
            <option value="Monitor">Monitor</option>
            <option value="Laptop">Laptop</option>
            <option value="Desktop">Desktop</option>
        </select>
    </div>

<script>
    $(document).ready(function(){
        $('#product').on('change', function() {
            if(this.value == ""){
                $(".Tablet").show();
                $(".Monitor").show();
                $(".Laptop").show();
                $(".Desktop").show();
            }
            else if (this.value == "Tablet"){
                $(".Tablet").show();
                $(".Monitor").hide();
                $(".Laptop").hide();
                $(".Desktop").hide();
            }
            else if (this.value == "Monitor"){
                $(".Monitor").show();
                $(".Tablet").hide();
                $(".Laptop").hide();
                $(".Desktop").hide();
            }
            else if (this.value == "Laptop"){
                $(".Laptop").show();
                $(".Tablet").hide();
                $(".Monitor").hide();
                $(".Desktop").hide();
            }
            else if (this.value == "Desktop"){
                $(".Desktop").show();
                $(".Monitor").hide();
                $(".Laptop").hide();
                $(".Tablet").hide();
            }
        });
    });
</script>

    <div>
        <?php
        foreach($viewmodel as $key => $value){
        foreach ($viewmodel[$key] as $item => $product) { ?>
        <?php echo '<div style="" class="well '.$product->__get('ProductType').'">' ?>
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
