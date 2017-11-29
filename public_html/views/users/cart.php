<div class="text-center">
<?php if(isset($_SESSION['is_logged_in'])):?>
    <h1>Welcome <?php echo ucwords($_SESSION['user_data']['FirstName']);?></h1>
<?php endif; ?>
<p class="lead">Click below to browse or add new products!</p>
<a class="btn btn-primary text-center" href="<?php echo ROOT_PATH;?>admin/addProduct">View Cart</a>
<div>
    <?php
    $productArray = $viewmodel->getCartProducts();
    foreach($productArray as $item => $product){
        foreach ($product as $item) { ?>
            <div class="well">
                <a class="btn btn-primary text-center" href="viewSpecs?ProductType=<?= $item->__get('ProductType') ?>&SerialNumber=<?= $item->__get('SerialNumber') ?>">View Product Specs</a>
                <a class="btn btn-primary text-center" href="?ProductType=<?= $item->__get('ProductType') ?>&SerialNumber=<?= $item->__get('SerialNumber') ?>">Remove Product</a>
                <table class="table">
                    <p><?php echo $item->__get('ProductType'); ?></p>
                    <tbody>
                    <tr><td>Brand:<?php echo $item->__get('Brand')?> </td></tr>
                    <tr><td>Model Number:<?php echo $item->__get('ModelNumber')?> </td></tr>
                    <tr><td>Price:<?php echo $item->__get('Price')?> </td></tr>
                    <tr><td>Serial Number:<?php echo $item->__get('SerialNumber')?> </td></tr>
                    <tr><td>Weight:<?php echo $item->__get('Weight')?> </td></tr>
                    </tbody>
                </table>
            </div>
        <?php }
    }
    ?>
</div>
<div class="well">
    <table class="table">
        <tbody>
        <tr><td>Total: <?php echo $viewmodel->getTotal() ?> </td></tr>
        </tbody>
    </table>
</div>
</div>
</div>