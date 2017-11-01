<?php
/**
 * Created by PhpStorm.
 * User: leban
 * Date: 2017-10-27
 * Time: 5:28 PM
 */

$products = ProductModel::findBy();
?>


<?php foreach($products as $product): ?>

    <div class="product-item">
        <div class="title"><?php echo $product->getName(); ?></div>
    </div>

<?php endforeach; ?>
