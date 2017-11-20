<?php
/**
 * Created by PhpStorm.
 * users: ahmadbiz
 * Date: 2017-11-05
 * Time: 3:33 PM
 */

require "DomainObject.php";

class Product extends DomainObject
{
    private $Weight;
    private $Brand;
    private $Model;
    private $Price;
    private $SerialNumber;
    private $productType;

    public function __construct($type)
    {
        $this->setProductType($type);
    }

    /**
     * @return mixed
     */
    public function getProductType()
    {
        return $this->productType;
    }

    /**
     * @param mixed $productType
     */
    public function setProductType($productType)
    {
        $this->productType = $productType;
    }

    /**
     * @return mixed
     */
    public function getWeight()
    {
        return $this->Weight;
    }
    /**
     * @param mixed $Weight
     */
    public function setWeight($Weight)
    {
        $this->Weight = $Weight;
    }
    /**
     * @return mixed
     */
    public function getBrand()
    {
        return $this->Brand;
    }
    /**
     * @param mixed $Brand
     */
    public function setBrand($Brand)
    {
        $this->Brand = $Brand;
    }
    /**
     * @return mixed
     */
    public function getModel()
    {
        return $this->Model;
    }
    /**
     * @param mixed $Model
     */
    public function setModel($Model)
    {
        $this->Model = $Model;
    }
    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->Price;
    }
    /**
     * @param mixed $Price
     */
    public function setPrice($Price)
    {
        $this->Price = $Price;
    }
    /**
     * @return mixed
     */
    public function getSerialNumber()
    {
        return $this->SerialNumber;
    }
    /**
     * @param mixed $SerialNumber
     */
    public function setSerialNumber($SerialNumber)
    {
        $this->SerialNumber = $SerialNumber;
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