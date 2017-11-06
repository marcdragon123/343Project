<?php
/**
 * Created by PhpStorm.
 * User: ahmadbiz
 * Date: 2017-11-05
 * Time: 2:42 PM
 */

abstract class Account {

    protected $isAdmin;
    protected $fName;
    protected $lName;
    protected $password;
    protected $email;
    protected $phone;
    protected $streetNum;
    protected $streetName;
    protected $city;
    protected $province;
    protected $postalCode;
    protected $country;
    protected $id;
    protected $loginStatus;

    public function setId($id){
        $this->id;
    }


    public function __set($name, $value){

        switch ($name){
            case "isAdmin":
                $this->isAdmin = $value;
                break;
            case "fName":
                $this->fName = $value;
                break;
            case "lName":
                $this->lName = $value;
                break;
            case "password":
                $this->password = $value;
                break;
            case "email":
                $this->email = $value;
                break;
            case "phone":
                $this->phone = $value;
                break;
            case "id":
                if(!(is_null($this->id))){
                    throw new Exception("cannot change ID");
                }
                $this->id = $value;
                break;
            case "streetNum":
                $this->streetNum = $value;
                break;
            case "streetName":
                $this->streetName = $value;
                break;
            case "city":
                $this->city = $value;
                break;
            case "province":
                $this->province = $value;
                break;
            case "postalCode":
                $this->postalCode = $value;
                break;
            case "country":
                $this->country = $value;
                break;
        }
    }

    public function __get($name)
    {
        switch ($name){
            case "isAdmin":
                return $this->isAdmin;
                break;
            case "fName":
                return $this->fName;
                break;
            case "lName":
                return $this->lName;
                break;
            case "password":
                return $this->password;
                break;
            case "email":
                return $this->email;
                break;
            case "phone":
                return $this->phone;
                break;
            case "id":
                return $this->id;
                break;
            case "streetNum":
                return $this->streetNum;
                break;
            case "streetName":
                return $this->streetName;
                break;
            case "city":
                return $this->city;
                break;
            case "province":
                return $this->province;
                break;
            case "postalCode":
                return $this->postalCode;
                break;
            case "country":
                return $this->country;
                break;
        }
    }

}