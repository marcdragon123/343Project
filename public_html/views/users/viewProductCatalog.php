
<div class="text-center">

   <?php if(isset($_SESSION['is_logged_in'])) : ?>
    <h1>Welcome <?php echo ucwords($_SESSION['user_data']['FirstName']);?></h1>
<?php endif; ?>
<p class="lead">Click below to browse our catalog or add new products!</p>
<div>
    <?php if(isset($_SESSION['is_logged_in'])) : ?>
    <?php endif; ?>
    <?php foreach($viewmodel as $item =>  $product) :
        $spec = users::objectify($product)?>
        <div class="well">
            <h3><?php echo $spec->__get('SerialNumber'); ?></h3>
            <small><?php //echo $product['']['SerialNumber']; ?></small>
            <hr />
            <p><?php echo $spec->__get('ProductType'); ?></p>
            <p><?php echo $spec->__get('Price'); ?></p>
            <p><?php echo $spec->__get('Brand'); ?></p>
            <p><?php echo $spec->__get('Model'); ?></p>
            <br />
        </div>
    <?php endforeach;?>
</div>
</div>