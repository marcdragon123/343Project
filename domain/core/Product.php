<?php
/**
 * Created by PhpStorm.
 * User: ahmadbiz
 * Date: 2017-11-05
 * Time: 3:33 PM
 */

class Product extends DomainObject
{
    private $id;
    private $type;
    private $weight;
    private $brand;
    private $serialNum;
    private $price;

    public function __construct($type){
        $this->type = $type;
    }

    public function __set($name, $value){
        switch ($name){
            case "id":
                if(!(isset($this->id))){
                    throw new Exception("cannot change ID");
                }
                $this->id = $value;
                break;
            case "weight":
                $this->weight = $value;
                break;
            case "brand":
                $this->brand  = $value;
                break;
            case "serialNum":
                if(!(isset($this->serialNum))){
                    throw new Exception("cannot change ID");
                }
                $this->serialNum = $value;
                break;
            case "price":
                $this->price = $value;
                break;
        }
    }

    public function __get($name){
        switch ($name){
            case "id":
                return $this->id;
                break;
            case "weight":
                return $this->weight;
                break;
            case "brand":
                return $this->brand;
                break;
            case "serialNum":
                return $this->serialNum;
                break;
            case "price":
                return $this->price;
                break;
        }
    }

}