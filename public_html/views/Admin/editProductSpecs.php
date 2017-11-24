

<?php if(isset($_SESSION['is_logged_in'])) : ?>
    <h1>Welcome <?php echo ucwords($_SESSION['user_data']['FirstName']);?></h1>
<?php endif; ?>
<p class="lead">Specifications of <?php echo $viewmodel->__get('Brand')?></p>

<script>

    window.onload = function(){

        $("#title").html("View Product Specs");
        $("#product").val("<?= $viewmodel->__get('ProductType'); ?>");
        $("#product").change();
        $("#product").attr('disabled', 'disabled');



        $("input[name='SerialNumber']").val("<?= @$viewmodel->__get('SerialNumber'); ?>");
        $("input[name='Brand']").val("<?= @$viewmodel->__get('Brand'); ?>");
    }

</script>

<?php
require("addProduct.php");
?>
