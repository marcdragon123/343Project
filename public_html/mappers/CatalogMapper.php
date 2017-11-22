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
    public $productIdMap;
    private static $instance = null;
    public $productCatalog;

    /**
     * @return CatalogMapper|null
     */
    public static function getInstance()
    {
        if (self::$instance == null)
        {
            self::$instance = new CatalogMapper();
        }

        return self::$instance;
    }

    /**
     * CatalogMapper constructor.
     */
    public function __construct() {

        $this->UOW = UnitOfWork::getInstance();
        $this->CatalogTDG = new CatalogTDG();
        $this->productIdMap = ProductsIdMap::getInstance();
        $this->productCatalog = ProductCatalog::getInstance();
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
        $obj = $this->_createProduct($data['name']);
        if($data)
        {
            $obj = $this->populate($obj, $data);
        }
        // adding product straight to Catalog Array, which will be saved in the idmap
        $this->productCatalog->addProduct($obj);
        //TODO: product catalog is saved in idMap;


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
     * @param Product $obj
     * @param array $data
     * @return Product
     */
    public function populate($obj, array $data)
    {
        // TODO: Implement populate() method.

        foreach ($data as $key => $value) {
            $obj->$key = $value;
        }
        return $obj;
    }


    /**
     * @param $type
     * @return Product
     */
    public function _createProduct($type)
    {
        switch($type)
        {
            case "Laptop":
                return new Laptop();
                break;
            case "DesktopComputer":
                return new Desktop();
                break;
            case "Monitor":
                return new Monitor();
                break;
            case "Tablet":
                return new Tablet();
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