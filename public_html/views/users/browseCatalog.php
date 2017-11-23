
<div class="panel panel-default" id="page-wrapper">
    <div class="panel-heading">
        <h3 class="panel-title">Browse Catalog</h3>
    </div>
    <div class="panel-body">
    	<?php foreach($products as $product) : ?>
	        <td><h3><?php print_r($product); echo '<br>'; ?></h3></td>
    	<?php endforeach;?>
    </div>
</div>


