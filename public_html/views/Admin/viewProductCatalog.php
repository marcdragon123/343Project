

<div class="text-center">
	<h1>Welcome <?php echo ucwords($_SESSION['user_data']['FirstName']);?></h1>
<p class="lead">Click below to browse or add new products!</p>
<a class="btn btn-primary text-center" href="<?php echo ROOT_PATH;?>catalog/addProduct">Add New Products</a>
<a class="btn btn-primary text-center" href="<?php echo ROOT_PATH;?>admin/adminCatalog">View Products Catalog</a>
<div>

</div>
</div>