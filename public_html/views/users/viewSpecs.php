<?php if(isset($_SESSION['is_logged_in'])) : ?>
    <h1>Welcome <?php echo ucwords($_SESSION['user_data']['FirstName']);?></h1>
<?php endif; ?>
<p class="lead">Specifications of <?php echo $viewmodel->__get('Brand')?></p>

<script>
    function checking() {
        var client = new XMLHttpRequest();
        client.open('GET', '<?= ROOT_URL ?>users/pingProduct?ProductType=<?= $_GET["ProductType"] ?>&SerialNumber=<?= $_GET["SerialNumber"] ?>');

        client.onreadystatechange = function (event) {

                if (this.responseText != "" && this.responseText == "tookover") {
                    window.location.href = "<?= ROOT_URL ?>users/viewProductCatalog";
                }
        }
        client.send();
    }
    window.onload = function(){

        $("#title").html("Vie product");
        $("#product").val("<?= $viewmodel->__get('ProductType'); ?>");
        $("#product").change();
        $("#product").attr('disabled', 'disabled');


        $("input").attr("disabled", "disabled");
        $(".btn-primary").prop("value", "Add to cart").prop("disabled", false);

        $("input[name='SerialNumber']").val("<?= @$viewmodel->__get('SerialNumber'); ?>");
        $("input[name='Brand']").val("<?= @$viewmodel->__get('Brand'); ?>");
        $("input[name='Price']").val("<?= @$viewmodel->__get('Price'); ?>");
        $("input[name='ModelNumber']").val("<?= @$viewmodel->__get('ModelNumber'); ?>");
        $("input[name='Weight']").val("<?= @$viewmodel->__get('Weight'); ?>");
        $("input[name='Battery']").val("<?= @$viewmodel->__get('Battery'); ?>");
        $("input[name='DisplaySize']").val("<?= @$viewmodel->__get('DisplaySize'); ?>");
        $("input[name='DisplayDimensions']").val("<?= @$viewmodel->__get('DisplayDimensions'); ?>");
        $("input[name='CPUType']").val("<?= @$viewmodel->__get('Brand'); ?>");
        $("input[name='RAMSize']").val("<?= @$viewmodel->__get('Brand'); ?>");
        $("input[name='CoreNumber']").val("<?= @$viewmodel->__get('CoreNumber'); ?>");
        $("input[name='HDDSize']").val("<?= @$viewmodel->__get('HDDSize'); ?>");
        $("input[name='OS']").val("<?= @$viewmodel->__get('OS'); ?>");
        $("input[name='CameraInformation']").val("<?= @$viewmodel->__get('CameraInformation'); ?>");
        $("input[name='ToucheScreenToggle']").val("<?= @$viewmodel->__get('ToucheScreenToggle'); ?>");





        setInterval(checking, <?= (30*500) ?>);
    }

</script>

<?php
require(__DIR__."/../Admin/addProduct.php");
?>
