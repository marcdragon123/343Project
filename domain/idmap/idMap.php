<?php
/**
 * Created by PhpStorm.
 * User: ahmadbiz
 * Date: 2017-11-14
 * Time: 1:01 PM
 */

class IdMap
{
    private $container = array();

    /**
     * @param $objectName
     * @param DomainObject $object
     * @return $this
     * @throws Exception
     */
    public function add($objectName, DomainObject $object)
    {
        if(isset($this->container[$objectName][$object->getID()])) {
            throw new Exception('cannot reset user id');
        }
        // Define an entry, based on the entity name, and the ID (primary key) of the entity
        $this->container[$objectName][$object->getID()] = $object;
        // Return this, so that we can easily chain set calls. (Fluent interface)
        return $this;
    }
    /**
     * Return an entity
     *
     * @param $objectName
     * @param $id
     * @return DomainObject
     */
    public function get($objectName, $id)
    {
        // If no entity is known by this ID, simply return NULL. It's not exceptional that a
        // key doesn't exists, so throwing an exception is not recommended.
        if ( ! isset($this->container[$objectName][$id])) {
            return null;
        }
        return $this->container[$objectName][$id];
    }

    public function remove($objectName, $id){
        if(isset($this->container[$objectName][$id])){
            throw new Exception('item does not exist, cannot delete it');
        }
        unset($this->container[$objectName][$id]);
        return $this;

    }
}