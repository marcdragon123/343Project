<?php

/**
 * Created by Marc-Andre Dragon.
 * Date: 2017-10-14
 * Time: 7:01 PM
 */

class MyThread extends Worker {
    private $objects = array();

    //code to be run when the object is constructed
    function __construct($object){
        if($object==null) {
            array_push($this->objects,null);
        }
        else{
            array_push($this->objects,$object);
        }
    }

    //takes a query and a connection to run a db query
    function excuteQuery($qry,$db){
        $res = $db->query($qry);
        if($res == null || $res === FALSE){
            return false;
        }
        return $res;

    }
    //code to be run when thread is started
    function run()
    {
        //ToDo write code to run query
    }
}