<?php

class ShoppingCart extends DomainObject
{
    protected $id;
    protected $customerEmail;
    protected $product;
    protected $shoppingCart;
    protected $numOfProducts;
    protected $cartTotal;

    public function __construct()
    {
        $this->shoppingCart = array();
        $this->numOfProducts = 0;
        $this->cartTotal = 0;
    }

    /**
     * @param $product
     * @throws Exception
     */
    public function addToCart($product)
    {
        if ((count($this->shoppingCart) >= 7))
        {
            throw new Exception('Maximum number of products you may add at once is 7');
        }
        array_push($this->shoppingCart,$product);
        $this->numOfProducts++;
    }

    /**
     * @param $product
     * @throws Exception
     */
    public function removeFromCart($product)
    {
        if ((count($this->shoppingCart) == 0))
        {
            throw new Exception('Your cart is empty');
        }
        if(!isset($this->shoppingCart[$product])){
            throw new Exception('Your cart is empty');
        }
        unset($this->shoppingCart[$product]);
        $this->numOfProducts++;
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
     *
     */
    public function calculateTotal()
    {
        $this->cartTotal = 0;
        foreach($this->shoppingCart as $value)
        {
            $this->cartTotal += $value->price;
        }
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
    public function getTotal()
    {
        return $this->cartTotal;
    }

}