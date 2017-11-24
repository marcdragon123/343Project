<?php
/**
 * Created by PhpStorm.
 * users: ahmadbiz
 * Date: 2017-11-05
 * Time: 3:33 PM
 */

class Product extends DomainObject
{
    protected $status;
    protected $ID;
    protected $Weight;
    protected $Brand;
    protected $ModelNumber;
    protected $Price;
    protected $SerialNumber;
    protected $ProductType;

    public function __construct($type)
    {
        $this->ProductType = $type;
    }

    /**
     * @param $name
     * @param $value
     */
    public function __set($name, $value) {
        $this->$name = $value;
    }

    /**
     * @param $name
     * @return int $id
     *
     */
    public function __get($name) {
        return $this->$name;
    }


    function getID()
    {
        return $this->ID;
    }

    /**
     * @param int $id
     */
    function setID($id)
    {
        $this->ID = $id;
    }
}