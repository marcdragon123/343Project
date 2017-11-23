<div class="text-center">
    <h1>Welcome <?php echo ucwords($_SESSION['user_data']['FirstName']);?></h1>
    <p class="lead">Click below to browse or add new products!</p>
    <a class="btn btn-primary text-center" href="<?php echo ROOT_PATH;?>catalog/addProduct">Add New Products</a>
    <a class="btn btn-primary text-center" href="<?php echo ROOT_PATH;?>admin/adminCatalog">View Products Catalog</a>
    <div class="text-center">
        <h1>Welcome <?php echo ucwords($_SESSION['user_data']['FirstName']);?></h1>
        <p class="lead">Click below to browse or add new products!</p>
        <a class="btn btn-primary text-center" href="<?php echo ROOT_PATH;?>catalog/addProduct">Add New Products</a>
        <div>
            <?php if(isset($_SESSION['is_logged_in'])) : ?>
            <?php endif; ?>
            <?php foreach($viewmodel as $item =>  $product) :
                $spec = admin::objectify($product)?>
                <div class="well">
                    <h3><?php echo $spec->__get('SerialNumber'); ?></h3>
                    <small><?php //echo $product['']['SerialNumber']; ?></small>
                    <hr />
                    <p><?//php echo $product['email']; ?></p>
                    <br />
                </div>
            <?php endforeach;?>
        </div>
    </div>
</div>
