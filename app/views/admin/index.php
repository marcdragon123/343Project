<div class="text-center">
	<h1>Welcome <?php echo ucwords($_SESSION['user_data']['firstName']);?></h1>
	<p class="lead">Click below to browse or add new products!</p>
	<a class="btn btn-primary text-center" href="<?php echo ROOT_PATH;?>catalog/addProduct">Add New Products</a>
    <a class="btn btn-primary text-center" href="<?php echo ROOT_PATH;?>admin/adminCatalog">View Products Catalog</a>
    <div>
        <?php if(isset($_SESSION['is_logged_in'])) : ?>
        <?php endif; ?>
        <?php foreach($viewmodel as $item) : ?>
            <div class="well">
                <h3><?php echo $item['firstName']; ?></h3>
                <small><?php echo $item['lastName']; ?></small>
                <hr />
                <p><?php echo $item['email']; ?></p>
                <br />
                <a class="btn btn-default" href="<?php echo $item['id']; ?>" target="_blank">Go To Website</a>
            </div>
        <?php endforeach; ?>
    </div>
</div>