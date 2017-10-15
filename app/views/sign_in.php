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
    
    // Loop through data of each row
    while($row = mysqli_fetch_assoc($search)) {
        //if Exists matching email and password
        if($row["Email"]==$email && $row["password"]==$password){
           header("Location: catalogue.html");
        }
        //If user enters wrong password
        else{
            //Take action
        }
        
     }
//If 
} else {
    echo "0 results";
}

}



?>