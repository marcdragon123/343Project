<html>
   <script src="../assets/js/register.js"></script>
<body>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Register User</h3>
          </div>
          <div class="panel-body">
            <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
                <span id="reauth-email" class="reauth-email"></span>
                
                <input type="email" id="email" class="form-control" name="email" placeholder="Email address" onchange="validate_email()" required autofocus >
                
                <div id="emailalert"><strong id="emailalertstrong"></strong></div>
                <!--Alerts-->
                <span id="reauth-email" class="reauth-email"></span>
                
                <input type="password" id="password" class="form-control" name="password" placeholder="Password" required>

                <span id="reauth-email" class="reauth-email"></span>

                <input type="text" id="fname" class="form-control" name="fname" placeholder="Enter your first name" onchange="validate_fname()" required autofocus>
                
                <div id="fnamealert"><strong id="fnamealertstrong"></strong></div> <!--Alerts-->

                <input type="text" id="lname" class="form-control" name="lname" placeholder="Enter your last name" required autofocus>

                <input type="text" id="phone" class="form-control" name="phone" placeholder="Enter your phone number" required autofocus>
                <div class="row">

                <!--Street name + Number -->
                <div class="col-sm-4">
                    <input type="text" id="streetnum" class="form-control" name="streetnum" placeholder="Street Number" required autofocus>
                </div>
                    <div class="col-sm-4">
                        <input type="text" id="streetname" class="form-control" name="streetname" placeholder="Enter Street Name" required autofocus>
                    </div>
                </div> <!--/Street name+ Number--->


                 <div class="row">

                <!--City + Postal Code -->
                <div class="col-sm-4">
                    <input type="text" id="city" class="form-control" name="city" placeholder="City" required autofocus>
                </div>
                    <div class="col-sm-4">
                        <input type="text" id="postalcode" class="form-control" name="postalcode" placeholder="Postal Code" required autofocus>
                    </div>
                </div> <!--/City + Postal code--->

                  <!--Province + Country -->    
                <div class="row">

                <div class="col-sm-4">
                    <input type="text" id="province" class="form-control" name="Province" placeholder="Province" required autofocus>
                </div>
                    <div class="col-sm-4">
                        <input type="text" id="country" class="form-control" name="Country" placeholder="Country" required autofocus>
                    </div>
            </div> <!--/City + Postal code--->
    	       <input class="btn btn-primary" name="submit" type="submit" value="Submit" />
            </form>
        </div>
    </div>
    </body>
</html>