<?php
/**
 * Created by PhpStorm.
 * User: ahmadbiz
 * Date: 2017-11-19
 * Time: 11:23 PM
 */

class ProductsIdMap
{
    public $productFile;
    public $container = array();
    private static $instance = null;

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new ProductsIdMap();
        }

        return self::$instance;
    }

    public function _construct()
    {
        $this->productFile = new File("Product.txt");
    }

    public function add($obj, $name)
    {
        $tempContainer= $this->productFile->read($this->productFile->getFileName());
        $this->container = $tempContainer[0];

        if(isset($this->container[$name][$obj->getSerialNumber()])) {
            throw new Exception('cannot reset product serial number: ' . $obj->getSerialNumber());
        }

        $this->container[$name][$obj->getSerialNumber()] = $obj;
        $this->productFile->write($this->container, true);

        // Define an entry, based on the entity name, and the ID (primary key) of the entity
        // Return this, so that we can easily chain set calls. (Fluent interface)
        return $this;
    }

    public function get($name,$serialNumber) {
        // If no entity is known by this ID, simply return NULL. It's not exceptional that a
        // key doesn't exists, so throwing an exception is not recommended.
        //echo "the id is: ".$id;

        $tempContainer= $this->productFile->read($this->productFile->getFileName());
        $this->container = $tempContainer[0];

        if (!isset($this->container[$name][$serialNumber])) {
            echo "doesnt exist";
            return null;
        }

        return $this->container[$name][$serialNumber];
    }

    public function remove($name,$serialNumber) {
        $tempContainer= $this->productFile->read($this->productFile->getFileName());
        $this->container = $tempContainer[0];

        if(isset($this->container[$name][$serialNumber])) {
            throw new Exception('item does not exist, cannot delete it');
        }
        unset($this->container[$name][$serialNumber]);
        $this->productFile->write($this->container, true);
        return $this;
    }
}