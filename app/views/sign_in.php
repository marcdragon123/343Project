<?php

//Private variables for class
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
            $email= $_POST['email'];
            $password = $_POST['password'];
            //Go to this function with the following parameters
            Sign_in($email, $password, $connection);
            }
        }  
    
//Catch email and password
function Sign_in($email, $password, $connection){
    
    //SQL Statement to check records in Table
    $sql = "SELECT Email,password FROM account_tbl";
    $search = mysqli_query($connection, $sql);
    //if table has more than 0 records
    if (mysqli_num_rows($search) > 0) {
    
        //checks if the user exists in table
        $if_exists = "SELECT Email,password FROM account_tbl WHERE Email = '$email' AND 
        password = '$password'";
        $checks = mysqli_query($connection, $if_exists);
        
        //if record matches    
        if(mysqli_num_rows($checks) > 0){
            header("Location:catalogue.html");
        }
        else{
            echo "
            <script>
            alert('User does not exists!');
            </script>";
        }
   

    } else{ //if there are no entries 
        
        die("No records in table");
    }

}
 


?>