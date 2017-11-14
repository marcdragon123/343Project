<?php
/**
 * Created by PhpStorm.
 * User: ahmadbiz
 * Date: 2017-11-13
 * Time: 7:07 PM
 */

class UnitOfWork{


    private $newObjects;
    private $dirtyObjects;
    private $removedObjects;
    private $committedObjects;

    public function __construct(){

        $this->newObjects = array();
        $this->dirtyObjects = array();
        $this->removedObjects = array();
        $this->committedObjects = array();

    }

    /**
     * register new object, first checks if object exits anywhere already
     * TODO: missing contracts here, can use assert?
     *
     * @param $obj
     */
    public function registerNew(DomainObject $obj){
        assert(!is_null($obj), "assertion failed, object has no id");
        if(!is_null($obj)){
            if(in_array($obj,$this->dirtyObjects)){
               echo "cant add old object as a new object";
            }
            elseif (in_array($obj,$this->removedObjects)){
                echo "cant register deleted obj";
            }
            elseif (in_array($obj,$this->newObjects)){
                echo "object already registered";
            }
            else{
                array_push($this->newObjects, $obj);
            }
        }

    }

    /**
     * checks if object is deleted or if object is already in dirty
     * @param $obj
     */
    public function registerDirty(DomainObject $obj){
        if(!is_null($obj)){
            if(in_array($obj, $this->removedObjects)){
                echo "cant modify a removed object";
            }
            elseif ((!in_array($obj, $this->dirtyObjects))&&(!in_array($obj,$this->newObjects))){
                array_push($this->dirtyObjects, $obj);
            }
        }
    }

    /**
     * checks if object is registered, if so, remove it and add to removedObjects[]
     *
     * @param $obj
     */
    public function registerRemoved(DomainObject $obj){
    if(!(is_null($obj))){
        if(in_array($obj, $this->newObjects)){
            unset($this->newObjects[$obj]);
            unset($this->dirtyObjects[$obj]);
            }
        if(!in_array($obj, $this->removedObjects)){
            array_push($this->removedObjects, $obj);
            }
        }
    }


    public function commit(){


    }


}