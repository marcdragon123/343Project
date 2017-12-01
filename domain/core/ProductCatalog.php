<?php

class ProductCatalog
{
    protected $productContainer = array();
    protected $productInCart = array();
    protected $soldProducts = array();
    public $containerFile;
    public $cartFile;
    public $soldFile;
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
        $this->soldFile = new File('soldProducts.txt');

        $temp = $this->containerFile->read($this->containerFile->getFileName());
        $this->productContainer = $temp[0];

        $temp = $this->cartFile->read($this->cartFile->getFileName());
        $this->productInCart = $temp[0];

        $temp = $this->soldFile->read($this->soldFile->getFileName());
        $this->soldProducts = $temp[0];
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

    /**
     * @param Product $product
     * @throws Exception
     */
    public function addedToCart($product){
        $this->deleteProduct($product);

        if (isset($this->productInCart[$product->__get('ProductType')][$product->__get('SerialNumber')])) {
            throw new Exception("Product Already In Cart Array");
        }
        $this->productInCart[$product->__get('ProductType')][$product->__get('SerialNumber')] = $product;
        $this->cartFile->write($this->productInCart, true);
    }

    /**
     * @param Product $product
     * @throws Exception
     */
    public function removedFromCart($product){
        $this->addProduct($product);

        if (!isset($this->productInCart[$product->__get('ProductType')][$product->__get('SerialNumber')])) {
            throw new Exception("Product is not in the cart");
        }
        unset($this->productInCart[$product->__get('ProductType')][$product->__get('SerialNumber')]);
        $this->cartFile->write($this->productInCart, true);
    }

    /**
     * @param Product $product
     * @throws Exception
     */
    public function purchasedProduct($product){
        if (isset($this->productInCart[$product->__get('ProductType')][$product->__get('SerialNumber')])) {
            unset($this->productInCart[$product->__get('ProductType')][$product->__get('SerialNumber')]);
            $this->cartFile->write($this->productInCart, true);
        }

        if (isset($this->productContainer[$product->__get('ProductType')][$product->__get('SerialNumber')])) {
            unset($this->productContainer[$product->__get('ProductType')][$product->__get('SerialNumber')]);
            $this->containerFile->write($this->productContainer, true);
        }

        if(isset($this->soldProducts[$product->__get('ProductType')][$product->__get('SerialNumber')])){
            throw new Exception('Product has been purchased before');
        }
        $this->soldProducts[$product->__get('ProductType')][$product->__get('SerialNumber')] = $product;
        $this->soldFile->write($this->soldProducts, true);
    }

    /**
     * @param $productType
     * @param $serialNumber
     * @return Product
     * @throws Exception
     */
    public function getPurchasedProduct($productType, $serialNumber){
        if(!isset($this->soldProducts[$productType][$serialNumber])){
            throw new Exception('product does not exist in purchased products');
        }
        return $this->soldProducts[$productType][$serialNumber];
    }

    /**
     * @param $productType
     * @param $serialNumber
     * @return Product
     * @throws Exception
     */
    public function returnedProduct($productType, $serialNumber){
        if(!isset($this->soldProducts[$productType][$serialNumber])){
            throw new Exception('product does not exist in purchased products');
        }

        $product = $this->soldProducts[$productType][$serialNumber];
        unset($this->soldProducts[$productType][$serialNumber]);
        $this->soldFile->write($this->soldProducts, true);

        return $product;

    }



}
