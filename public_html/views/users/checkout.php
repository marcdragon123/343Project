<div class="text-center">
    <?php if(isset($_SESSION['is_logged_in'])):?>
        <h1> <?php echo 'Transaction Number: '.$viewmodel->__get('transactionID');?></h1>
    <?php endif; ?>
    <div>
        <?php
        $productArray = $viewmodel->getPurchasedProducts();
        foreach ($productArray as $item => $product) {
            foreach ($product as $item) { ?>
                <div class="well">
                    <table class="table">
                        <tbody>
                        <tr>
                            <td>Product Type: <?php echo $item->__get('ProductType'); ?></td>
                        </tr>
                        <tr>
                            <td>Serial Number: <?php echo $item->__get('SerialNumber') ?> </td>
                        </tr>
                        <tr>
                            <td>Price :<?php echo $item->__get('Price') ?> </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            <?php }
        }
        ?>
    </div>
    <div class="well">
        <table class="table">
            <tbody>
            <tr><td>Total : <?php echo $viewmodel->__get('totalCost'); ?> </td></tr>
            <tr><td>Your Transaction id is : <?php echo $viewmodel->__get('transactionID'); ?> </td></tr>
            </tbody>
        </table>
    </div>
</div>
