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
                
            //Go to this function with the following parameters
              validate_entries($_POST);
            }
        }  
  


    function validate_entries($array_of_posts){
        header("Location:catalogue.html");
        
    }


?>