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

    public function setPurchasedProducts(array $products){
        $this->purchasedProducts = $products;
    }

    public function setProducts(){
        foreach ($this->getPurchasedProducts() as $product => $item){
            foreach ($item as $product){
                $i = 1;
                $this->__set("productType$i", $product->__get('ProductType'));
                $this->__set("serialNumber$i", $product->__get('SerialNumber'));
                $i++;
            }
        }
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