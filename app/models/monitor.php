<?php
/**
 * Created by PhpStorm.
 * User: ahmadbiz
 * Date: 2017-10-30
 * Time: 6:45 PM
 */

class MonitorModel extends ProductModel {
    private $displaySize;

    public function __construct($id = null){
        $this->productType = "Monitor";


    }

    public function __set($spec, $val){
        // TODO: Implement __set() method.
        switch ($spec){
            case "id":
                $this->id = $val;
                break;
            case "productType":
                $this->productType = $val;
                break;
            case "weight":
                $this->weight = $val;
                break;
            case "price":
                $this->price = $val;
                break;
            case "brandName":
                $this->brandName = $val;
                break;
            case "serialNum":
                $this->serialNum = $val;
                break;
            case "displaySize":
                $this->displaySize = $val;
        }

    }

    /**
     * @return MonitorModel[]
     */
    public static function findBy()
    {

        $products = parent::findBy();

        foreach ($products as &$product) {

            $product->retrieveMetas();

        }

        return $products;

    }

    public function retrieveMetas() {

        // Get all metas

        // Set props

    }

}