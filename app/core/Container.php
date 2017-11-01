<?php

/**
 * Created by Marc-Andre Dragon.
 * Date: 2017-10-14
 * Time: 1:25 PM
 */

//THERE SHOULD ONLY BE ONE CONTRAINER OBJECT
//Container is the gateway
class Container implements SplObserver
{
    private $readerQueries = array();
    private $writerQueries = array();
    private $conn = null;



    private $queryTypes = array("writer"=>"writer", "reader"=>"reader");

    /**
     * Container constructor.
     */
    public function __construct() {
        $this->conn = $this->createCon();
    }

    /**
     * Container Destructor
     */
    public function __destruct() {
        $this->closeCon();
    }

    /**
     * @return array
     */
    public function getReaderQueries(){
        return $this->readerQueries;
    }
    /**
     * @return array
     */
    public function getWriterQueries(){
        return $this->writerQueries;
    }
    /**
     * @return array
     */
    public function getQueryTypes(){
        return $this->queryTypes;
    }
    /**
     * @param array $readerQueries
     */
    public function setReaderQueries(array $readerQueries) {
        $this->readerQueries = $readerQueries;
    } //thread requests to run.

    /**
     * @param array $writerQueries
     */
    public function setWriterQueries(array $writerQueries) {
        $this->writerQueries = $writerQueries;
    } //thread requests to run.

    /**
     * @param $type
     * @param $object
     */
    public function request($type,$object) {
        $arrayReader = $this->getReaderQueries();
        $arrayWriter = $this->getWriterQueries();
        $arrayTypes = $this->getQueryTypes();

        if($type == $arrayTypes["reader"])
        {
            array_push($arrayReader, $object);
        }
        if($type == $arrayTypes["writer"])
        {
            array_push($arrayWriter, $object);
        }

    }

    /**
     * @param $object
     * @param $db
     */
    function notifyUpdateTable($object, $db) {

        $queryStart="UPDATE ";
        $serialNumber = $object->getSerialNumber();
        $objectType = $object->getType();

        $queryStart .= $this->determineTable($objectType);

        $queryStart.=" SET";
        $queryFinish=" WHERE SerialNumber=".$serialNumber;
        $type = "writer";

        foreach ($object->properties as $key=>$val) {
            $query = $queryStart." specKey=".$key.", specValue=".$val." ";
            $query.=$queryFinish;

            $this->request($type,$query);
        }

        $this->runUpdate($db);


    }


    /**
     * @param $object
     * @param $db
     */
    function notifyAddToTable($object, $db) {

        $queryStart="INSERT INTO ";
        $serialNumber = $object->getSerialNumber();
        $objectType = $object->getType();

        $queryStart .= $this->determineTable($objectType);

        $queryStart.=" ( specKey, specValue, SerialNumber ) VALUES ";
        $type = "writer";

        foreach ($object->properties as $key=>$val) {
            $query = $queryStart."( ".$key.", ".$val.", ".$serialNumber." )";
            $this->request($type,$query);
        }

        $this->runUpdate($db);

    }

    /**
     * @param $object
     * @param $db
     */
    function notifyRemoveFromTable($object, $db) {

        $query="DELETE FROM";
        $serialNumber = $object->getSerialNumber();
        $objectType = $object->getType();

        $query.= $this->determineTable($objectType);

        $query = $query." WHERE SerialNumber=".$serialNumber;
        $type = "writer";

        $this->request($type,$query);
        $this->runUpdate($db);

    }

    /**
     * @param $db
     */
    public function runUpdate($db)
    {
        $writer = $this->getWriterQueries();
        $reader = $this->getReaderQueries();
        $conn = $this->getCon();
        $results = array();
        while(!empty($reader) || !empty($writer))
        {
            if(!empty($writer))
            {
                foreach ($writer as $item) {
                    $res=$this->excuteQuery($item,$conn);
                    array_push($results,array($res,$item));
                }
            }

            if(!empty($reader))
            {
                foreach ($reader as $item) {
                    $res=$this->excuteQuery($item,$conn);
                    array_push($results,array($res,$item));
                }
            }

        }

        $this->getResults($db, $results);
    }


    /**
     * @param $qry
     * @param $db
     * @return bool or MySQLi object
     */
    //takes a query and a connection to run a db query
    function excuteQuery($qry,$db){
        $res = $db->query($qry);
        if($res == null || $res === FALSE){
            return false;
        }
        return $res;

    }

    /**
     * @param $objectType
     * @return string
     */
    public function determineTable($objectType)
    {
        switch ($objectType) {
            case 'Monitor':
                return "Monitor_tbl";
                break;
            case 'Tablet':
                return "Tablet_tbl";
                break;
            case 'Computer':
                return "DesktopComputer_tbl";
                break;
            case 'Laptop':
                return "Laptop_tbl";
                break;
        }
    }

    //get Connection to the db and opens the MySQLi connection or closes it if there is an error
    //Please update this class for local testing
    private function createCon(){
        $servername = "127.0.0.1";
        $servernamelocal = "localhost";
        $port = "3306";
        $username = "root";
        $password = "MSQLs24!!%%";
        $schema = "compstor_db";

        /*
                //Uncomment for the hosting solution
                $servername = "localhost";
                $servernamelocal = "127.0.0.1";
                $port = "3306";
                $username = "compstor_admin";
                $password = "MSQLs24!!%%";
                $schema = "compstor_db";
        */

        $conn = new mysqli($servername, $username, $password, $schema, $port);

        if($conn->connect_error){
            $conn  = new mysqli($servernamelocal, $username, $password, $schema, $port);

            if($conn->connect_error)
                die("Connection failed: " . $conn->connect_error);
        }
        return $conn;
    }

    public function getCon(){
        if ($this->conn==null) {
            return null;
        }
        else {
            return $this->conn;
        }
    }

    //closes a connection takes a connection object
    private function closeCon(){
        $conn = $this->conn;
        if(!$conn == null) {
            $conn->close();
        }
    }

    /**
     * @param $db
     * @param $results
     */
    public function getResults($db, $results)
    {
        foreach ($results as $result) {
            if ($result[0] == true) {
                $db->successful();
            }
            if ($result[0] == false) {
                $db->failure();
            }
            if ($result[0] == mysqli_result::class) {
                $db->result($result[0]);
            }
        }
    }

    /**
     * Receive update from subject
     * @link http://php.net/manual/en/splobserver.update.php
     * @param SplSubject $subject <p>
     * The <b>SplSubject</b> notifying the observer of an update.
     * </p>
     * @return void
     * @since 5.1.0
     */
    public function update(SplSubject $subject) {
    }


    public function authenticate($email, $password){ 
        $credentials = $this->select("account", "*", "Email='$email' AND Password='$password'");

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
}
?>

