<?php

//variables for class
$servername = "127.0.0.1";
$username = "root";
$password = "publicvoid1";
$dbname="compstor_db";

    //Create the connection
    $connection = new mysqli($servername, $username, $password,$dbname);
    
    //Test connection
    if($connection -> connect_error){
        die("connection failed");
    }    
    else{
            //If there was a post method
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
            /*$email= $_POST['email'];
            $password = $_POST['password'];
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $phonenum = $_POST['phone'];
            $streetnum = $_POST['streetnum'];
            $streetname = $_POST['streetname'];
            $city = $_POST['city'];
            $postalcode = $_POST['postalcode'];    
            $country = $_POST['country'];
            $province = $_POST['province'];
            */   
                
            //Go to this function for each inputs 
              
                    validate_entries($connection);
              
            }
        }  
  

    //validate entries
    function validate_entries($connection){
        
        /*
        
        VALIDATE HERE
        
        */
        
        add_to_table($connection);
        
        
    }

    //Insert after validation
    function add_to_table($connection){
        $email = $_POST['email'];
        
        //Select value that is duplicated 
        $sql_select = "SELECT Email FROM account_tbl WHERE Email = '$email'";
        
        
        //execute search query
        $search = mysqli_query($connection, $sql_select);
        
        //If this value exists
        if(mysqli_num_rows($search) > 0){
            die("User already exists");
        }
        else{ //If user doesn't exist, add him to table
           
           $sql_insert= "INSERT INTO account_tbl(FirstName, LastName,Email, PhoneNumber, Password, StreetName, StreetNumber, City, Province, Country, PostalCode) VALUES ('".$_POST['fname']."', '".$_POST['lname']."', '".$_POST['email']."', '".$_POST['phone']."', '".$_POST['password']."', '".$_POST['streetname']."', '".$_POST['streetnum']."', '".$_POST['city']."', '".$_POST['Province']."', '".$_POST['Country']."', '".$_POST['postalcode']."')";
           $insert = mysqli_query($connection, $sql_insert);
            
            echo "
            <script>
            alert('User has been successfully created!');
            </script>";
            
           
        
        }
        
    }
?>

<html>
    <a href="catalogue.html">Return</a>    
</html>