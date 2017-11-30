<?php

class ProductCatalog
{
    protected $productContainer = array();
    protected $productInCart = array();
    public $containerFile;
    public $cartFile;
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
        $this->cartFile = new File('productsInCart.txt');

        $temp = $this->containerFile->read($this->containerFile->getFileName());
        $this->productContainer = $temp[0];

        $temp = $this->cartFile->read($this->cartFile->getFileName());
        $this->productInCart = $temp[0];
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
        $this->containerFile->write($this->productContainer, true);

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

    public function addedToCart($product){
        $this->deleteProduct($product);

        if (isset($this->productInCart[$product->__get('ProductType')][$product->__get('SerialNumber')])) {
            throw new Exception("Product Already In Cart Array");
        }
        $this->productInCart[$product->__get('ProductType')][$product->__get('SerialNumber')] = $product;
        $this->cartFile->write($this->productInCart, true);
    }

    public function removedFromCart($product){
        $this->addProduct($product);

        if (!isset($this->productInCart[$product->__get('ProductType')][$product->__get('SerialNumber')])) {
            throw new Exception("Product is not in the cart");
        }
        unset($this->productInCart[$product->__get('ProductType')][$product->__get('SerialNumber')]);
        $this->cartFile->write($this->productInCart, true);

    }


}
