<?php


class Transaction extends DomainObject
{
    protected $userEmail;
    protected $transactionID;
    protected $timeStamp;
    protected $isComplete;
    protected $totalCost;
    protected $purchasedProducts = array();
    protected $productType1;
    protected $productType2;
    protected $productType3;
    protected $productType4;
    protected $productType5;
    protected $productType6;
    protected $productType7;
    protected $serialNumber1;
    protected $serialNumber2;
    protected $serialNumber3;
    protected $serialNumber4;
    protected $serialNumber5;
    protected $serialNumber6;
    protected $serialNumber7;

    public function __construct($userEmail)
    {
        $this->timeStamp = strtotime('now');
        $this->userEmail = $userEmail;
        $this->isComplete = true;
    }

    public function setProducts(){
        $this->totalCost = 0;
        foreach ($this->getPurchasedProducts() as $product => $item){
            foreach ($item as $product){
                $i = 1;
                $this->__set("productType$i", $product->__get('ProductType'));
                $this->__set("serialNumber$i", $product->__get('SerialNumber'));
                $this->totalCost = $this->totalCost + $product->__get('Price');
                $i++;
            }
        }
    }

    public function addToTransaction($product){
        if (isset($this->purchasedProducts[$product->__get('ProductType')][$product->__get('SerialNumber')])) {
            throw new Exception("This Product is already in your cart");
        }
        $this->purchasedProducts[$product->__get('ProductType')][$product->__get('SerialNumber')] = $product;
        $this->setProducts();
    }

    public function removeFromTransaction($productType, $serialNumber){
        if(!isset($this->purchasedProducts[$productType][$serialNumber])){
            throw new Exception('Your cart is empty');
        }
        unset($this->purchasedProducts[$productType][$serialNumber]);
        $this->setProducts();
    }

    public function getPurchasedProducts(){
        return $this->purchasedProducts;
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    public function __get($name)
    {
        return $this->$name;
    }


}