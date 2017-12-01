<div class="container">
    <?php if(isset($_SESSION['is_logged_in'])):?>
    <h2>List of Registered Users</h2>
    <?php endif; ?>
    <table class="table">
        <thead>
            <tr>
                <th>First name</th>
                <th>Last name</th>
                <th>Email</th>
                <th>Type</th>
            </tr>
            <?php foreach($viewmodel as $item) : ?>
            <tr>
                <th><?php echo $item['FirstName']; ?></th>
                <th><?php echo $item['LastName']; ?></th>
                <th><?php echo $item['Email']; ?></th>
                <th><?php
                if ($item['Type'] == 'A') {
                    echo "Admin";
                }
                else if ($item['Type'] == 'C') {
                    echo "Customer";
                }
                ?></th>
            </tr>
            <?php endforeach ?>
        </thead>
    </table>
</div>