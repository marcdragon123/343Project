<?php
/**
 * Created by PhpStorm.
 * User: ahmadbiz
 * Date: 2017-11-05
 * Time: 3:33 PM
 */

require "DomainObject.php";

class Product extends DomainObject
{
    private $weight;
    private $productID;
    private $brand;
    private $model;
    private $price;
    private $serialNumber;
    /**
     * @return mixed
     */
    public function getWeight()
    {
        return $this->weight;
    }
    /**
     * @param mixed $weight
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;
    }
    /**
     * @return mixed
     */
    public function getProductID()
    {
        return $this->productID;
    }
    /**
     * @param mixed $productID
     */
    public function setProductID($productID)
    {
        $this->productID = $productID;
    }
    /**
     * @return mixed
     */
    public function getBrand()
    {
        return $this->brand;
    }
    /**
     * @param mixed $brand
     */
    public function setBrand($brand)
    {
        $this->brand = $brand;
    }
    /**
     * @return mixed
     */
    public function getModel()
    {
        return $this->model;
    }
    /**
     * @param mixed $model
     */
    public function setModel($model)
    {
        $this->model = $model;
    }
    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }
    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }
    /**
     * @return mixed
     */
    public function getSerialNumber()
    {
        return $this->serialNumber;
    }
    /**
     * @param mixed $serialNumber
     */
    public function setSerialNumber($serialNumber)
    {
        $this->serialNumber = $serialNumber;
    }

    /**
     * @return int $id;
     */
    function getID()
    {
        // TODO: Implement getID() method.
    }

    /**
     * @param int $id
     */
    function setID($id)
    {
        // TODO: Implement setID() method.
    }
}