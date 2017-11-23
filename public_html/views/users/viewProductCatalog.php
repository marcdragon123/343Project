
<div class="text-center">

    <?php if(isset($_SESSION['is_logged_in'])) : ?>
    <h1>Welcome <?php echo ucwords($_SESSION['user_data']['FirstName']);?></h1>
    <?php endif; ?>
    <p class="lead">Click below to browse or add new products!</p>
    <div>
        <?php foreach($viewmodel as $item =>  $product) :
            $spec = users::objectify($product)?>
            <div class="well">
            <a href="editProductSpecs?ProductType=<?= $spec->__get('ProductType')?>&SerialNumber=<?= $spec->__get('SerialNumber')?>">Product Specs</a>

                <h3><?php echo $spec->__get('SerialNumber'); ?></h3>
                <small><?php //echo $product['']['SerialNumber']; ?></small>
                <hr />
                <p><?php echo $spec->__get('ProductType'); ?></p>
                <br />
            </div>
        <?php endforeach;?>
    </div>
</div>
