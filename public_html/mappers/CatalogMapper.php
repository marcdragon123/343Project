<?php
/**
 * Created by PhpStorm.
 * users: leban
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

        $this->UOW = new UnitOfWork($this);
        $this->CatalogTDG = new CatalogTDG();
    }

    /**
     * Create a new instance of the DomainObject-->Account class that this
     * mapper is responsible for. Optionally populating it
     * from a data array.
     *
     * @param array $data
     */
    public function create(array $data = null)
    {
        $obj = null;
        if($data)
        {
            $obj = $this->_createProduct($data["productType"]);
            $obj = $this->populate($obj, $data);
        }

        //$id = $this->CatalogTDG->;

    }

    /**
     * Save the DomainObject
     *
     * Store the DomainObject in persistent storage. Either insert
     * or update the store as required.
     *
     * @param DomainObject $obj
     */
    public function save($obj)
    {
        // TODO: Implement save() method.
    }

    /**
     * Delete the DomainObject
     *
     * Delete the DomainObject from persistent storage.
     *
     * @param DomainObject $obj
     */
    public function delete($obj)
    {
        // TODO: Implement delete() method.
    }

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
    public function populate($obj, array $data)
    {
        // TODO: Implement populate() method.

        foreach ($data as $key => $value) {
            $obj->$key = $value;
        }

        return $obj;
    }

    public function _createProduct($type)
    {
        switch($type)
        {
            case "Laptop":
                return new Laptop("Laptop");
                break;
            case "DesktopComputer":
                return new Desktop("DesktopComputer");
                break;
            case "Monitor":
                return new Monitor("Monitor");
                break;
            case "Tablet":
                return new Tablet("Tablet");
                break;
            Default :
                return null;
                break;
        }
    }

    /**
     * Create a new instance of a DomainObject
     *
     * @return DomainObject
     */
    public function _create()
    {
        // TODO: Implement _create() method.
    }

    /**
     * Insert the DomainObject to persistent storage
     *
     * @param DomainObject $obj
     */
    public function _insert($obj)
    {
        // TODO: Implement _insert() method.
    }

    /**
     * Update the DomainObject in persistent storage
     *
     * @param DomainObject $obj
     */
    public function _update($obj)
    {
        // TODO: Implement _update() method.
    }

    /**
     * Delete the DomainObject from peristent Storage
     *
     * @param DomainObject $obj
     */
    public function _delete($obj)
    {
        // TODO: Implement _delete() method.
    }
}