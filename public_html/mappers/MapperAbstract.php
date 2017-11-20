<?php
/**
 * Created by PhpStorm.
 * users: ahmadbiz
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
     */
    abstract public function create(array $data = null);

    /**
     * Save the DomainObject
     *
     * Store the DomainObject in persistent storage. Either insert
     * or update the store as required.
     *
     * @param Account $obj
     */
    abstract public function save(Account $obj);

    /**
     * Delete the DomainObject
     *
     * Delete the DomainObject from persistent storage.
     *
     * @param Account $obj
     */
    abstract public function delete(Account $obj);

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
    abstract public function _create();

    /**
     * Insert the DomainObject to persistent storage
     *
     * @param Account $obj
     */
    abstract public function _insert(Account $obj);

    /**
     * Update the DomainObject in persistent storage
     *
     * @param Account $obj
     */
    abstract public function _update(Account $obj);

    /**
     * Delete the DomainObject from peristent Storage
     *
     * @param Account $obj
     */
    abstract public function _delete(Account $obj);
}