<html>
<body>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Register User</h3>
    </div>
    <div class="panel-body">
        <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
            <span id="reauth-email" class="reauth-email"></span>

            <input type="email" id="Email" class="form-control" name="Email" placeholder="Email address" onchange="validate_email()" required autofocus >

            <div id="emailalert"><strong id="emailalertstrong"></strong></div>
            <!--Alerts-->
            <span id="reauth-email" class="reauth-email"></span>

            <input type="password" id="Password" class="form-control" name="Password" placeholder="password" required>

            <span id="reauth-email" class="reauth-email"></span>

            <input type="text" id="FirstName" class="form-control" name="FirstName" placeholder="Enter your first name" onchange="validate_fname()" required autofocus>

            <div id="fnamealert"><strong id="fnamealertstrong"></strong></div> <!--Alerts-->

            <input type="text" id="LastName" class="form-control" name="LastName" placeholder="Enter your last name" required autofocus>

            <input type="text" id="PhoneNumber" class="form-control" name="PhoneNumber" placeholder="Enter your phone number" required autofocus>
            <div class="row">

                <!--Street name + Number -->
                <div class="col-sm-4">
                    <input type="text" id="StreetNumber" class="form-control" name="StreetNumber" placeholder="Street Number" required autofocus>
                </div>
                <div class="col-sm-4">
                    <input type="text" id="StreetName" class="form-control" name="StreetName" placeholder="Enter Street Name" required autofocus>
                </div>
            </div> <!--/Street name+ Number--->


            <div class="row">

                <!--City + Postal Code -->
                <div class="col-sm-4">
                    <input type="text" id="City" class="form-control" name="City" placeholder="City" required autofocus>
                </div>
                <div class="col-sm-4">
                    <input type="text" id="PostalCode" class="form-control" name="PostalCode" placeholder="Postal Code" required autofocus>
                </div>
            </div> <!--/City + Postal code--->

            <!--Province + Country -->
            <div class="row">

                <div class="col-sm-4">
                    <input type="text" id="Province" class="form-control" name="Province" placeholder="Province" required autofocus>
                </div>
                <div class="col-sm-4">
                    <input type="text" id="Country" class="form-control" name="Country" placeholder="Country" required autofocus>
                </div>
            </div> <!--/City + Postal code--->
            <input class="btn btn-primary" name="submit" type="submit" value="Submit" />
        </form>
    </div>
</div>
</body>
</html>