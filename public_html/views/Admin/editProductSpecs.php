

<?php if(isset($_SESSION['is_logged_in'])) : ?>
    <h1>Welcome <?php echo ucwords($_SESSION['user_data']['FirstName']);?></h1>
<?php endif; ?>
<p class="lead">Specifications of <?php echo $viewmodel->__get('Brand')?></p>
<div>
    <div class="well">
        <h3><?php echo $viewmodel->__get('ProductType'); ?></h3>
        <hr />
        <p><?php echo $viewmodel->__get('SerialNumber'); ?></p>
        <br />
    </div>
</div>
