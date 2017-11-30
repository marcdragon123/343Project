<?php

class ShoppingCart extends DomainObject
{
    protected $id;
    protected $customerEmail;
    protected $product;
    protected $shoppingCart;
    protected $numOfProducts;
    protected static $cartTotal;


    public function __construct()
    {
        $this->shoppingCart = array();
        $this->numOfProducts = 0;
        self::$cartTotal = 0;
    }

    /**
     * @param Product $product
     * @throws Exception
     */
    public function addToCart($product)
    {
        if ((count($this->shoppingCart) >= 7))
        {
            throw new Exception('Maximum number of products you may add at once is 7');
        }
        if (isset($this->productContainer[$product->__get('ProductType')][$product->__get('SerialNumber')])) {
            throw new Exception("This Product is already in your cart");
        }
        $this->shoppingCart[$product->__get('ProductType')][$product->__get('SerialNumber')] = $product;
        $this->numOfProducts++;
    }

    public function getInCartProduct($productType, $serialNumber){
        if (!isset($this->shoppingCart[$productType][$serialNumber])) {
            throw new Exception("This Product is not in the cart");
        }
        return $this->shoppingCart[$productType][$serialNumber];

    }

    /**
     * @param $productType
     * @param $serialNumber
     * @throws Exception
     */
    public function removeFromCart($productType, $serialNumber)
    {
        if ((count($this->shoppingCart) == 0))
        {
            throw new Exception('Your cart is empty');
        }
        if(!isset($this->shoppingCart[$productType][$serialNumber])){
            throw new Exception('Your cart is empty');
        }
        unset($this->shoppingCart[$productType][$serialNumber]);
        $this->numOfProducts--;

    }

    /**
     * @return array
     * @throws Exception
     */
    public function getCartProducts(){
        if(($this->numOfProducts===0)){
            throw new Exception('Cart is Empty');
        }
        return $this->shoppingCart;
    }

    /**
     * @return mixed
     */
    public function getSize()
    {
        return $this->numOfProducts;
    }


    /**
     * @return mixed
     */
    public function getTotal(){
        foreach ($this->shoppingCart as $item=>$product){
            foreach ($product as $item){
                self::$cartTotal = self::$cartTotal+$item->__get('Price');
            }
        }
        return self::$cartTotal;
    }

}