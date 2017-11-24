<?php
/**
 * Created by PhpStorm.
 * User: Shayan
 * Date: 2017-11-21
 * Time: 3:08 PM
 */

require "DomainObject.php";

class ShoppingCart extends DomainObject
{
    protected $customerEmail;
    protected $product;
    protected $productsContainer;
    protected $numOfProducts;
    protected $cartTotal;

    public function createCart($email)
    {
        $this->customerEmail = $email;
        $this->productsContainer = array();
        $this->numOfProducts = 0;
        $this->cartTotal = 0;
    }

    /**
     * @param Product $product
     */
    public function addToCart($product)
    {
        if (count($this->productsContainer) <= 7)
        {
            array_push($this->productsContainer,$product);
            $this->numOfProducts++;
        }
    }

    /**
     * @param Product $product
     */
    public function removeFromCart($product)
    {
        if (count($this->productsContainer) > 0)
        {

            $this->numOfProducts--;

        }
    }

    /**
     *
     */
    public function calculateTotal()
    {
        $this->cartTotal = 0;
        foreach($this->productsContainer as $value)
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