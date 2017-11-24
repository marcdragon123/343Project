
<div class="text-center">
	<h1>Welcome <?php echo ucwords($_SESSION['user_data']['FirstName']);?></h1>
	<p class="lead">Click below to browse or add new products!</p>
	<a class="btn btn-primary text-center" href="<?php echo ROOT_PATH;?>admin/addProduct">Add New Products</a>
    <div>
        <?php
            foreach($viewmodel as $key => $value){
                foreach ($viewmodel[$key] as $item => $product) { ?>
                    <div class="well">
                        <a class="btn btn-primary text-center" href="editProductSpecs?ProductType=<?= $product->__get('ProductType') ?>&SerialNumber=<?= $product->__get('SerialNumber') ?>">View Product
                            Specs</a>
                        <table class="table">
                            <p><?php echo $product->__get('ProductType'); ?></p>
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
</div>
