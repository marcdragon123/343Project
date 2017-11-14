<?php
/**
 * Created by PhpStorm.
 * User: ahmadbiz
 * Date: 2017-11-05
 * Time: 6:32 PM
 */

class CustomerMapper extends MapperAbstract{

    /**
     * Fetch a user object by ID
     *
     * An example skeleton of a "Fetch" function showing
     * how the database data ($dataFromDb) is used to
     * create a new User instance via the create function.
     *
     * @param string $id
     * @param string $password
     * @return Account
     */
    public function findById($id, $password){
        $dbData = array(
            'email' => $id,
            'password' => $password
        );
        return $this->create($dbData);
    }

    public function createAccount(array $post){
        $userTDG = new UserTDG();
        //TODO: must call the idmap and uow

        return $userTDG->insert($post);

    }

    /**
     * Populate the Customer (AccountObj) with
     * the data array.
     *
     * This is a very simple example, but the mapping
     * can be as complex as required.
     *
     * @param Account $obj
     * @param array $data
     * @return Customer
     */
    public function populate(Account $obj, array $data){
        $obj->__set("fname", $data['fName']);
        $obj->__set("lName", $data['lName']);
        $obj->__set("isAdmin", $data['isAdmin']);
        $obj->__set("password", $data['password']);
        $obj->__set("email", $data['email']);
        $obj->__set("phone", $data['phone']);
        $obj->__set("streetNum", $data['streetNum']);
        $obj->__set("streetName", $data['streetName']);
        $obj->__set("city", $data['city']);
        $obj->__set("province", $data['provice']);
        $obj->__set("postalCode", $data['postalCode']);
        $obj->__set("country", $data['country']);

        return $obj;
    }

    public function initializeId(Account $obj, $userId){
        $obj->setId($userId);
        return $userId;
    }

    /**
     * Create a new User DomainObject
     *
     * @return Customer
     */
    public function _create(){

        return new Customer();
    }

    /**
     * Insert the DomainObject in persistent storage
     *
     * This may include connecting to the database
     * and running an insert statement.
     *
     * @param Account $obj
     */
    public function _insert(Account $obj)
    {
        // TODO: Implement _insert() method, this should simply call the tdg insert Method
    }

    /**
     * Update the DomainObject in persistent storage
     *
     * This may include connecting to the database
     * and running an update statement.
     *
     * @param Account $obj
     */
    public function _update(Account $obj)
    {
        // TODO: Implement _update() method, call tdg update Method
    }

    /**
     * Delete the DomainObject from persistent storage
     *
     * This may include connecting to the database
     * and running a delete statement.
     *
     * @param Account $obj
     */
    public function _delete(Account $obj)
    {
        // TODO: Implement _update() method, call tdg update
    }

    /**
     *
     */
    public function _commit()
    {
        // TODO: Implement _commit() method, call UOW commit

    }

    //updateloginsession
    //clearallloginsessions

}