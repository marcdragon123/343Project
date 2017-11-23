<?php
/**
 * Created by PhpStorm.
 * users: ahmadbiz
 * Date: 2017-11-05
 * Time: 3:33 PM
 */

class Product extends DomainObject
{
    protected $Weight;
    protected $Brand;
    protected $Model;
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
}