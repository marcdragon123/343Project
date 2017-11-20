

<html ng-app="">

<?php
foreach($viewmodel as $row) : ?>

<div>
    <?php foreach($row as $item): ?>
    <h3><?php echo $item;?></h3>

        <?php endforeach;?>
    <?php endforeach;?>
</html>