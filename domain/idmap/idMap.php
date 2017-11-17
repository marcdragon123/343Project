<?php
/**
 * Created by PhpStorm.
 * User: ahmadbiz
 * Date: 2017-11-14
 * Time: 1:01 PM
 */

class IdMap
{
    public static $container = array();
    private static $instance = null;


    public static function getInstance()
    {
        if (self::$instance === null)
        {
            self::$instance = new IdMap();
        }

        return self::$instance;
    }
    private function __construct(){

    }

    public function add(Customer $object)
    {
        if(isset(IdMap::$container[$object->getID()])) {
                var_dump(IdMap::$container[$object->getID()]);
                throw new Exception('cannot reset user id: ' . $object->getID());
        }

        IdMap::$container[$object->getID()] = $object;
        //var_dump($this->container[$objectName][$object->getID()]);

        // Define an entry, based on the entity name, and the ID (primary key) of the entity
        // Return this, so that we can easily chain set calls. (Fluent interface)
        return $this;
    }

    public function get($id)
    {
        // If no entity is known by this ID, simply return NULL. It's not exceptional that a
        // key doesn't exists, so throwing an exception is not recommended.
        //echo "the id is: ".$id;

        if (!isset(IdMap::$container[$id])) {
            echo "doesnt exist";
            return null;
        }
        //var_dump($this->container[$objectName][$id]);
        return IdMap::$container[$id];
    }

    public function remove( $id){
        if(isset(IdMap::$container[$id])){
            throw new Exception('item does not exist, cannot delete it');
        }
        unset(IdMap::$container[$id]);
        return $this;

    }
}