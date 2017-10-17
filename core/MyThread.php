<?php

/**
 * Created by Marc-Andre Dragon.
 * Date: 2017-10-14
 * Time: 7:01 PM
 */

class MyThread extends Worker {
    private $objects = array();
    private $db;

    //code to be run when the object is constructed
    function __construct($object, $db){
        if($object==null) {
            array_push($this->objects,null);
        }
        else{
            array_push($this->objects,$object);
        }

        if($db==null) {
            $db = null;
        }
        else{
            $this->db = $db;
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
        $res = array();
        foreach ($this->objects as $item) {
            array_push($res,$this->excuteQuery($item, $this->db));
        }


    }
}