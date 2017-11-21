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
     * Delete the DomainObject
     *
     * Delete the DomainObject from persistent storage.
     *
     * @param DomainObject $obj
     */
    abstract public function delete($obj);

    /**
     * Populate the DomainObject with the values
     * from the data array.
     *
     * To be implemented by the concrete mapper class
     *
     * @param DomainObject $obj
     * @param array $data
     * @return DomainObject
     */
    abstract public function populate($obj, array $data);

    /**
     * Create a new instance of a DomainObject
     *
     * @return DomainObject
     */
    abstract public function _create();

    /**
     * Insert the DomainObject to persistent storage
     *
     * @param DomainObject $obj
     */
    abstract public function _insert($obj);

    /**
     * Update the DomainObject in persistent storage
     *
     * @param DomainObject $obj
     */
    abstract public function _update($obj);

    /**
     * Delete the DomainObject from persistent Storage
     *
     * @param DomainObject $obj
     */
    abstract public function _delete($obj);
}