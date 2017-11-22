<?php
/**
 * Created by PhpStorm.
 * users: ahmadbiz
 * Date: 2017-11-05
 * Time: 3:33 PM
 */

class ProductCatalog{


    protected $productMapper;
    protected $productContainer = array();
    protected $productsInUse = array();

    private static $instance;

    public static function getInstance(){
        if(self::$instance === null){
            self::$instance = new ProductCatalog();
        }

        return self::$instance;
    }

    private function __construct()
    {

    }


    public function addProduct(Product $product){

        if(isset($this->productContainer[$product->__get('ProductType')][$product->__get('SerialNumber')])){
            throw new Exception("Product Serial Number Already Exists");
        }
        $this->productContainer[$product->__get('ProductType')][$product->__get('SerialNumber')] = $product;
    }

    public function editProduct(Product $product){
        if(!isset($this->productContainer[$product->__get('ProductType')][$product->__get('SerialNumber')])){
            throw new Exception("Product is not in the Product Catalog");
        }
        $this->productContainer[$product->__get('ProductType')][$product->__get('SerialNumber')] = $product;

    }

    public function deleteProductSpecification($productType, $productSerialNumber){

    }

    public function viewByType($productType){

    }

    public function viewAllProducts(){

    }


}