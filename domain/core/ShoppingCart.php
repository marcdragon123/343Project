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
    private $items = array ();
    private $CustomerID;

    public function addToCart($p)
    {
        if (count($this.items) <= 7)
        {
            array_push($items,$p);
        }
    }
    public function removeFromCart($p)
    {
        if (count($this.items) > 0)
        {
            array_remove($items,$p);
        }
    }
    public function checkOut()
    {

    }
}