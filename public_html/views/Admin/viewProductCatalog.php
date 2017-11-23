
<div class="text-center">
	<h1>Welcome <?php echo ucwords($_SESSION['user_data']['FirstName']);?></h1>
	<p class="lead">Click below to browse or add new products!</p>
	<a class="btn btn-primary text-center" href="<?php echo ROOT_PATH;?>catalog/addProduct">Add New Products</a>
    <div>
        <?php foreach($viewmodel as $item =>  $product) :
            $spec = admin::objectify($product)?>
            <div class="well">
                    <form action="editProductSpecs" method="post">
                        <input type="hidden" name="ProductType" value="<?php echo $spec->__get('ProductType')?>">
                        <input type="hidden" name="SerialNumber" value="<?php echo $spec->__get('SerialNumber')?>">
                        <input class="button" name="viewSpecifivation" type="submit" value="View Specs">
                    </form>
                <h3><?php echo $spec->__get('SerialNumber'); ?></h3>
                <small><?php //echo $product['']['SerialNumber']; ?></small>
                <hr />
                <p><?php echo $spec->__get('ProductType'); ?></p>
                <br />
            </div>
        <?php endforeach;?>
    </div>
</div>
