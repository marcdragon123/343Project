<?php

class ProductsIdMap
{
    public $productFile;
    public $container = array();
    private static $instance = null;

   public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new IdMap();
        }

       return self::$instance;
    }

   public function __construct() {
        $this->productFile = new File();
    }

   public function add(Product $object, $objectName) {
        $tempContainer= $this->productFile->read($this->productFile->getFileName());
        $this->container = $tempContainer[0];

       if(isset($this->container[$objectName][$object->getSerialNumber()])) {
            throw new Exception('cannot reset users email: ' . $object->getSerialNumber());
        }

       $this->container[$objectName][$object->getSerialNumber()] = $object;
        $this->productFile->write($this->container, true);

       // Define an entry, based on the entity name, and the ID (primary key) of the entity
        // Return this, so that we can easily chain set calls. (Fluent interface)
        return $this;
    }

   public function get($objectName,$serialNumber) {
        // If no entity is known by this ID, simply return NULL. It's not exceptional that a
        // key doesn't exists, so throwing an exception is not recommended.
        //echo "the id is: ".$id;

       $tempContainer= $this->productFile->read($this->productFile->getFileName());
        $this->container = $tempContainer[0];

       if (!isset($this->container[$objectName][$serialNumber])) {
            echo "doesnt exist";
            return null;
        }

       return $this->container[$objectName][$serialNumber];
    }

   public function remove($objectName,$serialNumber) {
        $tempContainer= $this->productFile->read($this->productFile->getFileName());
        $this->container = $tempContainer[0];

       if(isset($this->container[$objectName][$serialNumber])) {
            throw new Exception('item does not exist, cannot delete it');
        }
        unset($this->container[$objectName][$serialNumber]);
        $this->productFile->write($this->container, true);
        return $this;
    }

}