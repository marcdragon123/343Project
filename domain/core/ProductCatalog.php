<?php

class ProductCatalog
{


    protected $productContainer = array();
    protected $productsInUse = array();
    private $containerFile;
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
    }

    /**
     * @param Product $product
     * @throws Exception
     */
    public function addProduct(Product $product)
    {
        $this->productContainer = $this->getProductContainer();

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
    public function editProduct(Product $product)
    {
        $this->productContainer = $this->getProductContainer();
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
        $this->productContainer = $this->getProductContainer();
        if (!isset($this->productContainer[$product->__get('ProductType')][$product->__get('SerialNumber')])) {
            throw new Exception("Product is not in the Product Catalog");
        }
        unset($this->productContainer[$product->__get('ProductType')][$product->__get('SerialNumber')]);
    }

    /**
     * @param $productType
     */
    public function viewByType($productType)
    {
        $this->productContainer = $this->getProductContainer();

        foreach ($this->productContainer[$productType] as $product){
            $this->myMapper->showProductsByType($product);
        }
    }

    /**
     *
     */
    public function viewAllProducts()
    {
        $this->productContainer = $this->getProductContainer();

        foreach ($this->productContainer as $type => $product){
            $this->myMapper->showAllProducts($product);
        }
    }

    /**
     * @return mixed
     */
    public function getProductContainer()
    {
        $temp = $this->containerFile->read($this->containerFile->getFileName());
        return $temp[0];
    }
}
