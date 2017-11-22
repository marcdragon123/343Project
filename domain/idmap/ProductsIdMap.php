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

    /**
     * @param Product $object
     * @param $objectName
     * @return $this
     * @throws Exception
     */
    public function add(Product $object, $objectName) {
        $this->container = $this->getContainer();

        if(isset($this->container[$objectName][$object->__get('SerialNumber')])) {
            throw new Exception('cannot reset users email: ' . $object->__get('SerialNumber'));
        }

        $this->container[$objectName][$object->__get('SerialNumber')] = $object;
        $this->productFile->write($this->container, true);

        // Define an entry, based on the entity name, and the ID (primary key) of the entity
        // Return this, so that we can easily chain set calls. (Fluent interface)
        return $this;
    }

    /**
     * @param $objectName
     * @param $serialNumber
     * @return null
     */
    public function get($objectName,$serialNumber) {
        // If no entity is known by this ID, simply return NULL. It's not exceptional that a
        // key doesn't exists, so throwing an exception is not recommended.
        //echo "the id is: ".$id;

        $this->container = $this->getContainer();

        if (!isset($this->container[$objectName][$serialNumber])) {
            return null;
        }

        return $this->container[$objectName][$serialNumber];
    }

    /**
     * @param $objectName
     * @param $serialNumber
     * @return $this
     * @throws Exception
     */
    public function remove($objectName,$serialNumber) {
        $this->container = $this->getContainer();

        if(!isset($this->container[$objectName][$serialNumber])) {
            throw new Exception('item does not exist, cannot delete it');
        }
        unset($this->container[$objectName][$serialNumber]);
        $this->productFile->write($this->container, true);
        return $this;
    }

    public function getContainer(){
        $tempContainer = $this->productFile->read($this->productFile->getFileName());
        return $tempContainer[0];
    }

}