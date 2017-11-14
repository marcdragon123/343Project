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
     * Setting an entity object.
     * @param $object
     * @param $id
     * @return IdMap
     */
    public function set($object, $id)
    {
        if (isset($this->container[$object][$id])) {
        }
        $this->container[$object][$id] = $id;
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
        if ( ! isset($this->container[$objectName][$id])) {
            return null;
        }
        return $this->container[$objectName][$id];
    }
}