<?php

class ProductCatalog
{
    protected $productContainer = array();
    protected $productsInUse = array();
    public $containerFile;
    public $myMapper;

    private static $instance;

    /**
     * @return ProductCatalog
     */
    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new ProductCatalog();
        }
        return self::$instance;
    }

    private function __construct()
    {
        $this->myMapper = CatalogMapper::getInstance();
        $this->containerFile = new File('productContainer.txt');

        $this->productContainer = $this->getProductContainer();
    }

    /**
     * @param Product $product
     * @throws Exception
     */
    public function addProduct(Product $product)
    {
        if (isset($this->productContainer[$product->__get('ProductType')][$product->__get('SerialNumber')])) {
            throw new Exception("Product Serial Number Already Exists");
        }
        $this->productContainer[$product->__get('ProductType')][$product->__get('SerialNumber')] = $product;
        $this->containerFile->write($this->productContainer, true);
    }

    /**
     * @param Product $product
     * @throws Exception
     */
    public function modifyProduct(Product $product)
    {
        if (!isset($this->productContainer[$product->__get('ProductType')][$product->__get('SerialNumber')])) {
            throw new Exception("Product is not in the Product Catalog");
        }
        $this->productContainer[$product->__get('ProductType')][$product->__get('SerialNumber')] = $product;
        $this->containerFile->write($this->productContainer, true);

    }

    /**
     * @param Product $product
     * @throws Exception
     */
    public function deleteProduct(Product $product)
    {

        if (!isset($this->productContainer[$product->__get('ProductType')][$product->__get('SerialNumber')])) {
            throw new Exception("Product is not in the Product Catalog");
        }
        unset($this->productContainer[$product->__get('ProductType')][$product->__get('SerialNumber')]);
    }

    /**
     * @param $productType
     * @return mixed
     */
    public function viewByType($productType)
    {

        return $this->productContainer[$productType];

    }

    /**
     * @return array|mixed
     */
    public function viewAllProducts()
    {
        return $this->productContainer;
    }

    /**
     * @param $productType
     * @param $serialNumber
     * @return Product
     * @throws Exception
     */
    public function getProduct($productType, $serialNumber){

        if (!isset($this->productContainer[$productType][$serialNumber])) {
            throw new Exception("Product is not in the Product Catalog");
        }

        return $this->productContainer[$productType][$serialNumber];
    }

    /**
     * @return mixed
     */
    private function getProductContainer()
    {
        $temp = $this->containerFile->read($this->containerFile->getFileName());
        return $temp[0];
    }
}
