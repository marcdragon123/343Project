<?php

namespace App;

class Config
{
    //FOR TESTING
    //You should change these values to work with your DB
    private $db_host="localhost";
    private $db_user="root";
    private $db_pass="";
    private $db_name="compstore";

    private $con = null;
    private $connection = null;
    
    //REAL THING
    /*private $db_host="localhost";
    private $db_user="compstor_db";
    private $db_pass="12345";
    private $db_name="highfive_main_db";*/
    
    
       
    public function insert($table,$values,$rows = null){
        $insert = 'INSERT INTO '.$table;
        if($rows != null){
            $insert .= ' ('.$rows.')'; 
        }
        for($i = 0; $i < count($values); $i++){
            if(is_string($values[$i])){
                $values[$i] = '"'.$values[$i].'"';
            }
        }
        $values = implode(',',$values);
        $insert .= ' VALUES ('.$values.')';
        $ins = @mysqli_query($this->connection, $insert);
    }
    
    public function checkExists($table, $identifier, $value, $extraWhere=NULL){
        $q= "SELECT * FROM ".$table." WHERE ".$identifier."='".$value."'";
        if($extraWhere!=NULL){
            $q.=" AND ".$extraWhere;
        }
        echo($q);
        $check=mysqli_query($this->connection, $q);
        $rows=mysqli_num_rows($check);
        if($rows==0){
            return false;
        } else if($rows>0){
            return true;
        }
    }
    
    public function delete($table,$where) {
        $q = 'DELETE FROM '.$table.' WHERE '.$where;
        $query=mysqli_query($this->connection, $q);
        return $query;
    }
    
    public function returnLastID(){
        $conn = $this->connection;
        $i = $conn->insert_id;
        return $i;
    }


}