<?php


class ShoppingCartIdMap
{
    public $shoppingCartFile;
    public $container = array();
    private static $instance = null;

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new ShoppingCartIdMap();
        }

        return self::$instance;
    }

    private function __construct() {
        $this->shoppingCartFile = new File('ShoppingCartIdMap.txt');
        $this->container = $this->getContainer();
    }

    /**
     * @param ShoppingCart $object
     * @param $userEmail
     * @return $this
     * @throws Exception
     */
    public function add(ShoppingCart $object, $userEmail) {
        $this->container[$userEmail] = $object;
        $this->shoppingCartFile->write($this->container, true);

        // Define an entry, based on the entity name, and the ID (primary key) of the entity
        // Return this, so that we can easily chain set calls. (Fluent interface)
        return $this;
    }

    /**
     * @param $userEmail
     * @return ShoppingCart
     */
    public function get($userEmail) {
        // If no entity is known by this ID, simply return NULL. It's not exceptional that a
        // key doesn't exists, so throwing an exception is not recommended.
        //echo "the id is: ".$id;

        if (!isset($this->container[$userEmail])) {
            return null;
        }

        return $this->container[$userEmail];
    }


    /**
     * @param $userEmail
     * @return $this
     * @throws Exception
     */
    public function remove($userEmail) {

        if(!isset($this->container[$userEmail])) {
            throw new Exception('item does not exist, cannot delete it');
        }
        unset($this->container[$userEmail]);
        $this->shoppingCartFile->write($this->container, true);
        return $this;
    }


    public function getContainer(){
        $tempContainer = $this->shoppingCartFile->read($this->shoppingCartFile->getFileName());
        return $tempContainer[0];
    }
}