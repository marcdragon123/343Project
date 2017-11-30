<?php
/**
 * Created by PhpStorm.
 * users: ahmadbiz
 * Date: 2017-11-14
 * Time: 1:01 PM
 */

class IdMap
{
    public $customerFile;
    public $container = array();
    private static $instance = null;

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new IdMap();
        }

        return self::$instance;
    }

    public function __construct() {
        $this->customerFile = new CustomerFile();
        $this->container = $this->getContainer();

    }

    /**
     * @param Account $object
     * @param $objectName
     * @return $this
     * @throws Exception
     */
    public function add(Account $object, $objectName) {

        if(isset($this->container[$objectName][$object->__get("Email")])) {
                throw new Exception('cannot reset users email: ' . $object->__get("Email"));
        }

        $this->container[$objectName][$object->__get("Email")] = $object;
        $this->customerFile->write($this->container, true);

        // Define an entry, based on the entity name, and the ID (primary key) of the entity
        // Return this, so that we can easily chain set calls. (Fluent interface)
        return $this;
    }

    /**
     * @param $objectName
     * @param $email
     * @return Account
     */
    public function get($objectName,$email) {
        // If no entity is known by this ID, simply return NULL. It's not exceptional that a
        // key doesn't exists, so throwing an exception is not recommended.
        //echo "the id is: ".$id;

        if (!isset($this->container[$objectName][$email])) {
            return null;
        }

        return $this->container[$objectName][$email];
    }

    /**
     * @param $objectName
     * @param $email
     * @return $this
     * @throws Exception
     */
    public function remove($objectName,$email) {

        if(!isset($this->container[$objectName][$email])) {
            throw new Exception('item does not exist, cannot delete it');
        }
        unset($this->container[$objectName][$email]);
        $this->customerFile->write($this->container, true);
        var_dump($email);
        return $this;
    }

    public function getContainer(){
        $tempContainer= $this->customerFile->read($this->customerFile->getFileName());
        return $tempContainer[0];
    }
}