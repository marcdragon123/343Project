<?php
/**
 * Created by PhpStorm.
 * User: leban
 * Date: 2017-11-19
 * Time: 1:44 PM
 */

class CatalogMapper extends MapperAbstract
{
    public $UOW;
    public $CatalogTDG;
    private static $instance = null;


    public static function getInstance()
    {
        if (self::$instance == null)
        {
            self::$instance = new CatalogMapper();
        }

        return self::$instance;
    }

    public function __construct() {

       //$this->UOW = new UnitOfWork($this);
        $this->CatalogTDG = new CatalogTDG();
    }

    public function populate(Account $obj, array $data)
    {
        // TODO: Implement populate() method.
    }

    public function _create(){
        return new Catalog();
    }


    public function selectAll(){
        $tdg = CatalogMapper::getInstance();
        $array_Catalog = $tdg->CatalogTDG->selectAll();

        return $array_Catalog;
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
        //var_dump($obj->__get('firstName'));

        $this->userTDG->insert($obj);
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
        //$this->userTDG->update($obj);
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
        //$this->userTDG->delete($obj->getID());
    }

    /**
     *
     */
    public function updateLoginSession(){
        //$this->UOW->registerDirty($this);
        //$this->UOW->commit();

    }

    //clearallloginsessions


    /**
     * Create a new instance of the DomainObject-->Account class that this
     * mapper is responsible for. Optionally populating it
     * from a data array.
     *
     * @param array $data
     */
    public function create(array $data = null)
    {
        // TODO: Implement create() method.
    }

    /**
     * Save the DomainObject
     *
     * Store the DomainObject in persistent storage. Either insert
     * or update the store as required.
     *
     * @param Account $obj
     */
    public function save(Account $obj)
    {
        // TODO: Implement save() method.
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
        // TODO: Implement delete() method.
    }
}