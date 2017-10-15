<?php

include ('Lock.php');
/**
 * Created by Marc-Andre Dragon.
 * Date: 2017-10-14
 * Time: 10:33 AM
 */
$lock= new Lock();
$GLOBALS['lock'] = $lock;

class Database implements SplSubject
{
    private $conn = null;
    private $observer;

    function __construct() {
        $this->conn = $this->getCon();
        $lock = $this->getLock();
        $this->attach($lock);
    }

    function __destruct()
    {
        $this->getCon();
        $this->detach($this->observer);
    }

    //get Connection to the db and opens the MySQLi connection or closes it if there is an error
    //Please update this class for local testing
    function getCon(){
        $servername = "127.0.0.1";
        $servernamelocal = "localhost";
        $port = "3306";
        $username = "admin";
        $password = "MSQLs24!!%%";
        $schema = "compstor_db";

/*
        //Uncomment for the hosting solution
        $servernamelocal = "localhost";
        $port = "3306";
        $username = "compstor_admin";
        $password = "MSQLs24!!%%";
        $schema = "compstor_db";
        $conn  = new mysqli($servernamelocal, $username, $password, $schema, $port);
        if($conn->connect_error)
            die("Connection failed: " . $conn->connect_error);
        return $conn;

*/

        $conn = new mysqli($servername, $username, $password, $schema, $port);

        if($conn->connect_error){
            $conn  = new mysqli($servernamelocal, $username, $password, $schema, $port);

            if($conn->connect_error)
                die("Connection failed: " . $conn->connect_error);
        }
        return $conn;
    }
    //closes a connection takes a connection object
    function closeCon(){
        $conn = $this->conn;
        $res = $conn->close();
        return $res;
    }
    //access the global array to notify lock of a change
    function getLock(){
        return $GLOBALS['lock'];
    }


    function updateTable($object){
        $lock = $this->getLock();
        $lock->notifyUpdateTable($object);
    }

    function addToTable($object){
        $lock = $this->getLock();
        $lock->notifyAddToTable($object);
    }

    function removeFromTable($object){
        $lock = $this->getLock();
        $lock->notifyRemoveFromTable($object);
    }

    /**
     * Attach an SplObserver
     * @link http://php.net/manual/en/splsubject.attach.php
     * @param SplObserver $observer <p>
     * The <b>SplObserver</b> to attach.
     * </p>
     * @return void
     * @since 5.1.0
     */
    public function attach(SplObserver $observer)
    {
        $this->observer = $observer;
    }

    /**
     * Detach an observer
     * @link http://php.net/manual/en/splsubject.detach.php
     * @param SplObserver $observer <p>
     * The <b>SplObserver</b> to detach.
     * </p>
     * @return void
     * @since 5.1.0
     */
    public function detach(SplObserver $observer)
    {
        $observer = null;
    }

    /**
     * Notify an observer
     * @link http://php.net/manual/en/splsubject.notify.php
     * @return void
     * @since 5.1.0
     */
    public function notify()
    {

    }
}

?>