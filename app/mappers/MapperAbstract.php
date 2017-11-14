<?php
/**
 * Created by PhpStorm.
 * User: ahmadbiz
 * Date: 2017-11-05
 * Time: 6:16 PM
 */

abstract class MapperAbstract {

    /**
     * Create a new instance of the DomainObject-->Account class that this
     * mapper is responsible for. Optionally populating it
     * from a data array.
     *
     * @param array $data
     * @return Account
     */

    public function create(array $data = null){
        $obj = $this->_create();

        if($data){
            $obj = $this->populate($obj, $data);
        }
        return $obj;
    }


    /**
     * Save the DomainObject
     *
     * Store the DomainObject in persistent storage. Either insert
     * or update the store as required.
     *
     * @param Account $obj
     */
    public function save(Account $obj){
        if(is_null($obj->__get("id"))){
            $this->_insert($obj);
        } else {
            $this->_update($obj);
        }
    }

    /**
     * Delete the DomainObject
     *
     * Delete the DomainObject from persistent storage.
     *
     * @param Account $obj
     */
    public function delete(Account $obj)
    {
        $this->_delete($obj);
    }

    /**
     * Populate the DomainObject with the values
     * from the data array.
     *
     * To be implemented by the concrete mapper class
     *
     * @param Account $obj
     * @param array $data
     * @return Account
     */
    abstract public function populate(Account $obj, array $data);

    /**
     * Create a new instance of a DomainObject
     *
     * @return Account
     */
    abstract protected function _create();

    /**
     * Insert the DomainObject to persistent storage
     *
     * @param Account $obj
     */
    abstract protected function _insert(Account $obj);

    /**
     * Update the DomainObject in persistent storage
     *
     * @param Account $obj
     */
    abstract protected function _update(Account $obj);

    /**
     * Delete the DomainObject from peristent Storage
     *
     * @param Account $obj
     */
    abstract protected function _delete(Account $obj);

    /**
     * Commit DomainObject to DB
     * calls UOW commit method
     */
    abstract protected function _commit();
}