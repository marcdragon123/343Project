
<div class="text-center">
	<h1>Welcome <?php echo ucwords($_SESSION['user_data']['FirstName']);?></h1>
	<p class="lead">Click below to browse or add new products!</p>
	<a class="btn btn-primary text-center" href="<?php echo ROOT_PATH;?>catalog/addProduct">Add New Products</a>
    <div>
        <?php
            foreach($viewmodel as $key => $value){
                foreach ($viewmodel[$key] as $item => $product) { ?>
                    <div class="well">
                        <a href="editProductSpecs?ProductType=<?= $product->__get('ProductType') ?>&SerialNumber=<?= $product->__get('SerialNumber') ?>">Product
                            Specs</a>
                        <h3><?php echo $product->__get('SerialNumber'); ?></h3>
                        <small><?php ?></small>
                        <p><?php echo $product->__get('ProductType'); ?></p>
                        <hr/>
                        <br/>
                    </div>
                <?php }
            }
        ?>
    </div>
</div>
