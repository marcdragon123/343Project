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
    }

    public function add(Customer $object, $objectName) {
        $tempContainer= $this->customerFile->read($this->customerFile->getFileName());
        $this->container = $tempContainer[0];

        if(isset($this->container[$objectName][$object->__get("Email")])) {
                throw new Exception('cannot reset users email: ' . $object->__get("Email"));
        }

        $this->container[$objectName][$object->__get("Email")] = $object;
        $this->customerFile->write($this->container, true);

        // Define an entry, based on the entity name, and the ID (primary key) of the entity
        // Return this, so that we can easily chain set calls. (Fluent interface)
        return $this;
    }

    public function get($objectName,$email) {
        // If no entity is known by this ID, simply return NULL. It's not exceptional that a
        // key doesn't exists, so throwing an exception is not recommended.
        //echo "the id is: ".$id;

        $tempContainer= $this->customerFile->read($this->customerFile->getFileName());
        $this->container = $tempContainer[0];

        if (!isset($this->container[$objectName][$email])) {
            echo "doesnt exist";
            return null;
        }

        return $this->container[$objectName][$email];
    }

    public function remove($objectName,$email) {
        $tempContainer= $this->customerFile->read($this->customerFile->getFileName());
        $this->container = $tempContainer[0];

        if(isset($this->container[$objectName][$email])) {
            throw new Exception('item does not exist, cannot delete it');
        }
        unset($this->container[$objectName][$email]);
        $this->customerFile->write($this->container, true);
        return $this;
    }

   /* public function findByEmail($objectName,$email) {
        $tempContainer= $this->customerFile->read($this->customerFile->getFileName());
        $this->container = $tempContainer[0];
        $object = null;
        for ($i = 0; $i<sizeof($this->container[$objectName]);$i++){
            //var_dump($this->container[$objectName][$i]);
            $object = $this->container[$objectName][$i];
            print_r($object);
            foreach ($object as $customer){
                echo "".($customer[$email]);
            }
            //var_dump($object);
            echo "<br>";
        }
        //var_dump($this->container['Customer']);

        //foreach ($this->container[$objectName] as $account) {
            //if($account['email'] == $email){
              //  return;
            //}
        //}
        return false;
    }
   */
}