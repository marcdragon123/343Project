<?php
/**
 * Created by PhpStorm.
 * users: leban
 * Date: 2017-11-19
 * Time: 1:44 PM
 */

class CatalogMapper extends MapperAbstract
{
    public $CatalogTDG;
    private static $instance = null;

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
    private function __construct() {
        $this->CatalogTDG = new CatalogTDG();
    }

    /**
     * Create a new instance of the DomainObject-->Account class that this
     * mapper is responsible for. Optionally populating it
     * from a data array.
     *
     * @param array $data
     * @return Product $obj
     */
    public function create(array $data = null)
    {
        $obj = $this->_createProduct($data['ProductType']);
        if($data)
        {
            $obj = $this->populate($obj, $data);
        }
        // adding product straight to Catalog Array, which will be saved in the idmap
        ProductCatalog::getInstance()->addProduct($obj);
        UnitOfWork::getInstance()->registerNew($obj);
        UnitOfWork::getInstance()->commit(CatalogMapper::getInstance());

        return null;
    }

    /**
     * Delete the Product from active memory.
     * Delete the Product from persistent storage.
     *
     * @param DomainObject $obj
     */
    public function deleteProduct($obj)
    {
        ProductCatalog::getInstance()->deleteProduct($obj);
        UnitOfWork::getInstance()->registerDeleted($obj);
        UnitOfWork::getInstance()->commit(CatalogMapper::getInstance());
    }

    public function editProduct(){

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