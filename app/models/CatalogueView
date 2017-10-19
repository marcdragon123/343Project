<?php
     
    class Object extends Model{
        //define variables
        private $value;
        private $SerialNumber;
        private $servername = "localhost";
        private $username = "root";
        private $password = "publicvoid1";
        private $dbname="compstor_db";
        
        $connection = new mysqli($servername, $username, $password,$dbname);
    
        //Test connection
        if($connection -> connect_error){
            die("connection failed");
        }    
        
        
        //create catalogue object
        __construct($value, $serialNumber){
            $this->value = $value;
            $this->SerialNumber = $SerialNumber;
            
        }
     
        private function getValue(){
            return $this->value;    
            
        }
        
        private function getSerialNumber(){
            return $this->SerialNumber;
        }
     
        public function access_db():array{
            $sql = "CREATE VIEW ViewLaptop
                    AS SELECT Value, SerialNumber
                    FROM laptop_tbl
                    ";
            $sql1 = "Select * FROM ViewLaptop";
            
            $query = mysqli_query($this->connection, $sql1);
            
            return $query;
        }
        
        public function CreateObjects(){
            $query = access_db();
            $array = array();
            foreach($query as $objects){
                
            }
        }
        
    }
