<?php

/**
 * Created by Marc-Andre Dragon.
 * Date: 2017-11-01
 * Time: 9:01 PM
 */

abstract class Gateway
{
    private $readerQueries = array();
    private $writerQueries = array();
    private $listSavepointTransaction = array();
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
    }

    /**
     * @return mixed
     */
    public function getSavepointTransaction()
    {
        return $this->listSavepointTransaction;
    }

    /**
     * @param mixed $savepointTransaction
     */
    public function setSavepointTransaction($savepointTransaction)
    {
        $this->listSavepointTransaction = $savepointTransaction;
    }

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

    public function rollback($name) {
        $rollback = "ROLLBACK TO ".$name;
        $conn = $this->getCon();
        $conn->query($rollback);
    }

    /**
     * @param $db
     */
    public function commit($db)
    {
        //local variables
        $writer = $this->getWriterQueries();
        $reader = $this->getReaderQueries();
        $conn = $this->getCon();
        $results = array();
        $transactionID = $db->getTransactionID();



        while(!empty($reader) || !empty($writer))
        {
            if(!empty($writer))
            {
                mysqli_commit($conn);
                mysqli_begin_transaction($conn,MYSQLI_TRANS_START_READ_WRITE, $transactionID);
                foreach ($writer as $item) {
                    $res=$this->excuteQuery($item,$conn);
                    array_push($results,array($res,$item));
                }
                mysqli_savepoint($conn,$transactionID);
                array_push($this->getSavepointTransaction(), $transactionID);
                mysqli_commit($conn);
            }

            if(!empty($reader))
            {
                mysqli_commit($conn);
                mysqli_begin_transaction($conn, MYSQLI_TRANS_START_READ_ONLY);
                foreach ($reader as $item) {
                    $res=$this->excuteQuery($item,$conn);
                    array_push($results,array($res,$item));
                }
                mysqli_commit($conn);
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

    //get Connection to the db and opens the MySQLi connection or closes it if there is an error
    //Please update this class for local testing
    private function createCon(){
        $servername = "127.0.0.1";
        $servernamelocal = "localhost";
        $port = "8080";
        $username = "root";
        $password = "publicvoid1";
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

    abstract public function dirtyObject($obj);
    abstract public function cleanObject($obj);
    abstract public function registerNew($obj);
    abstract public function registerDeleted($obj);

}