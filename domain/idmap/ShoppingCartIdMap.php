<?php

/**
 * Created by Marc-Andre Dragon.
 * Date: 2017-11-22
 * Time: 1:27 PM
 */

class ShoppingCartIdMap
{
    public $shoppingCartFile;
    public $container = array();
    private static $instance = null;

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new IdMap();
        }

        return self::$instance;
    }

    public function __construct() {
        $this->shoppingCartFile = new File('ShoppingCartIdMap.txt');
    }

    /**
     * @param ShoppingCart $object
     * @param $accountID
     * @return $this
     * @throws Exception
     */
    public function add(ShoppingCart $object, $accountID) {
        $this->container = $this->getContainer();

        if(isset($this->container[$accountID])) {
            throw new Exception('cannot reset users shopping cart for account ID: '.$accountID);
        }

        $this->container[$accountID] = $object;
        $this->shoppingCartFile->write($this->container, true);

        // Define an entry, based on the entity name, and the ID (primary key) of the entity
        // Return this, so that we can easily chain set calls. (Fluent interface)
        return $this;
    }

    /**
     * @param $accountID
     * @return null
     */
    public function get($accountID) {
        // If no entity is known by this ID, simply return NULL. It's not exceptional that a
        // key doesn't exists, so throwing an exception is not recommended.
        //echo "the id is: ".$id;

        $this->container = $this->getContainer();

        if (!isset($this->container[$accountID])) {
            return null;
        }

        return $this->container[$accountID];
    }

    /**
     * @param $accountID
     * @return $this
     * @throws Exception
     */
    public function remove($accountID) {
        $this->container = $this->getContainer();

        if(!isset($this->container[$accountID])) {
            throw new Exception('item does not exist, cannot delete it');
        }
        unset($this->container[$accountID]);
        $this->shoppingCartFile->write($this->container, true);
        return $this;
    }

    public function getContainer(){
        $tempContainer = $this->shoppingCartFile->read($this->shoppingCartFile->getFileName());
        return $tempContainer[0];
    }
}