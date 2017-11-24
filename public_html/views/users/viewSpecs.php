<?php if(isset($_SESSION['is_logged_in'])) : ?>
    <h1>Welcome <?php echo ucwords($_SESSION['user_data']['FirstName']);?></h1>
<?php endif; ?>
<p class="lead">Specifications of <?php echo $viewmodel->__get('Brand')?></p>

<script>

    window.onload = function(){

        $("#title").html("Vie product");
        $("#product").val("<?= $viewmodel->__get('ProductType'); ?>");
        $("#product").change();
        $("#product").attr('disabled', 'disabled');

        $("input").attr("disabled", "disabled");
        $(".btn-primary").prop("value", "Add to cart").prop("disabled", false);

        $("input[name='Brand']").val("<?= @$viewmodel->__get('Brand'); ?>");

    }

</script>

<?php
require(__DIR__."/../Admin/addProduct.php");
?>
