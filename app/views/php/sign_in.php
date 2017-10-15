<?php

//Private variables for class
private $servername = "localhost";
private $username = "root";
private $password = "";
private $dbname="compstor_db";
die();
//Establish a connection between html/php file and mysql DB 

    
    //Create the connection
    $connection = new mysqli($this->$servername, $this->$username, $this->$password,$dbname);
    
    //Test connection
    if($connection -> connect_error){
        die("connection failed");
    }    
    echo "connection succesful";    


function Sign_in(){
    
    
}



?>