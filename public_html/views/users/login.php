<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">User Login</h3>
    </div>
    <div class="panel-body">
        <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
            <div class="form-group">
                <input type="text" name="Email" placeholder="Email" class="form-control" />
            </div>
            <div class="form-group">
                <input type="password" name="Password" placeholder="Password" class="form-control" />
            </div>
            <input class="btn btn-primary" name="submit" type="submit" value="Submit"/>
        </form>
    </div>
</div>