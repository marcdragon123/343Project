<?php

namespace App;

class Config
{
    //FOR TESTING
    //You should change these values to work with your DB
    private $db_host="localhost";
    private $db_user="root";
    private $db_pass="";
    private $db_name="compstore_db";

    private $con = null;
    private $connection = null;
    
    //REAL THING
    /*private $db_host="localhost";
    private $db_user="compstor_db";
    private $db_pass="12345";
    private $db_name="highfive_main_db";*/
    
    private $result = array();
    
    public function getResult(){
        return $this->result;
    }
    
    public function connect() {
        if (!$this->con){
            $connection = @mysqli_connect($this->db_host,$this->db_user,$this->db_pass,$this->db_name);
            if($connection){
                $this->con=true;
                $this->connection=$connection;
                return true;
            } else {
                return false;
            }
        } else {
            return true;
        }
    }
    
    public function disconnect() {
        if ($this->con){
            if(@mysqli_close($this->connection)){
                $this->con=false;
                return true;
            } else {
                return false;
            }
        }
    }

    public function authenticate($email, $password){ 
        $credentials = $this->select("account_tbl", "*", "email='$email' AND password='$password'");

        if($credentials) {
            return $credentials[0];
        } else {
            return false;
        }
    }

    public function select($table, $rows = '*', $where = null, $order = null){
        $q = 'SELECT '.$rows.' FROM '.$table;
        if($where != null){
            $q .= ' WHERE '.$where;
        }
        if($order != null){
            $q .= ' ORDER BY '.$order;
        }
        $query = @mysqli_query($this->connection, $q);
        if($query){
            $this->queryRows = mysqli_num_rows($query);
            if ($this->queryRows >0){
                unset($this->result);
                for($i=0; $i < $this->queryRows; $i++){
                    $rowArray=mysqli_fetch_array($query, MYSQLI_ASSOC);
                    $keysArray=array_keys($rowArray);
                    for($x=0;$x<count($keysArray);$x++){
                        $this->result[$i][$keysArray[$x]]=$rowArray[$keysArray[$x]];
                    }  
                }
            } else {
                $this->result=null;
            }return $this->result;
            
        } else{
            return false; 
        }
    }
    
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
    
    //returns a join of two tables (inner, left, or right)
    public function joinTables($joinType, $table1, $table2, $table1columns, $table2columns, $table1equality, $table2equality, $where=NULL, $orderBy=NULL){
        for($x=0;$x<count($table1columns);$x++){
            $table1columns[$x] = $table1.'.'.$table1columns[$x];
        }
        $table1columns=implode(', ',$table1columns);
        for($x=0;$x<count($table2columns);$x++){
            $table2columns[$x] = $table2.'.'.$table2columns[$x];
        }
        $table2columns=implode(', ',$table2columns);
        if($table1columns!=NULL && $table2columns!=NULL){
            $tableColumns = $table1columns.', '.$table2columns;
        } else{
            if ($table1columns==NULL){
                $tableColumns=$table2columns;
            } else if ($table2columns==NULL){
                $tableColumns=$table1columns;
            }
        }
        $q = 'SELECT '.$tableColumns.' FROM '.$table1.' '.$joinType.' JOIN '.$table2.' ON '.$table1.'.'.$table1equality.' = '.$table2.'.'.$table2equality;
        
        if($where!=NULL){
            $q.=' WHERE '.$where;
        }
        if($orderBy!=NULL){
            $q.=' ORDER BY '.$orderBy;
        }
        $query=@mysqli_query($this->connection, $q);
        if($query){
            unset($this->result);
            $this->queryRows = mysqli_num_rows($query);
            if ($this->queryRows >0){
                for($i=0; $i < $this->queryRows; $i++){
                    $rowArray=mysqli_fetch_array($query, MYSQLI_ASSOC);
                    $keysArray=array_keys($rowArray);
                    for($x=0;$x<count($keysArray);$x++){
                        $this->result[$i][$keysArray[$x]]=$rowArray[$keysArray[$x]];
                    }  
                }
            } else {
                $this->result=null;
            }
            return $this->result;
        } else{
            return false; 
        } 
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