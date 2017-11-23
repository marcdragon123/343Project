<?php
?>

<html>

<table>
    <?php foreach($viewmodel as $row) : ?>

        <?php foreach($row as $item): ?>
            <td><h3><?php echo $item;?></h3></td>

        <?php endforeach;?>
    <?php endforeach;?>
</table>

</html>
