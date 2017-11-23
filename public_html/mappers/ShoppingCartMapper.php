<?php

/**
 * Created by Marc-Andre Dragon.
 * Date: 2017-11-22
 * Time: 1:53 PM
 */

class ShoppingCartMapper
{
    public $ShoppingCartTDG;
    private static $instance = null;

    /**
     * @return ShoppingCart|null
     */
    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new ShoppingCart();
        }

        return self::$instance;
    }

    /**
     * ShoppingCart constructor.
     */
    private function __construct() {
        $this->ShoppingCartTDG = new ShoppingCartTDG();
    }

    /*
     * Still needs work to be done.
     */

    /**
     * Create a new instance of the DomainObject-->Account class that this
     * mapper is responsible for. Optionally populating it
     * from a data array.
     *
     * @param array $data
     * @return ShoppingCart $obj
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

}