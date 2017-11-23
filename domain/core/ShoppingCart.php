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
    private $customerID;
    private $products;
    private $size;
    private $total;

    public function createCart($customerID)
    {
        $this->customerID = $customerID;
        $this->products = array();
        $this->size = 0;
        $this->total = 0;
    }

    public function addToCart($product)
    {
        if (count($this->products) == 0)
        {

        }

        if (count($this->products) <= 7)
        {
            array_push($this->products,$product);
        }
    }
    public function removeFromCart($product)
    {
        if (count($this->products) > 0)
        {
            array_splice($this->products,array_search($this->products, $product),1);
        }
    }

    public function calculateSize()
    {
        $this->size = 0;
        foreach($this->products as $value)
        {
            $this->size++;
        }
    }

    public function calculateTotal()
    {
        $this->total = 0;
        foreach($this->products as $value)
        {
            $this->total += $value->price;
        }
    }

    public function getSize()
    {
        return $this->size;
    }

    public function getTotal()
    {
        return $this->total;
    }

    public function checkOut()
    {

    }
}