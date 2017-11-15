<?php
/**
 * Created by PhpStorm.
 * User: ahmadbiz
 * Date: 2017-11-05
 * Time: 2:42 PM
 */

abstract class Account extends DomainObject {

    protected static $id=0;
    protected $isAdmin;
    protected $firstName;
    protected $lastName;
    protected $password;
    protected $email;
    protected $phone;
    protected $streetNumber;
    protected $streetName;
    protected $city;
    protected $province;
    protected $postalCode;
    protected $country;
    protected $loginStatus;


    public function getID()
    {
        return $this::$id;
    }

    public function __set($name, $value){

        switch ($name){
            case "isAdmin":
                $this->isAdmin = $value;
                break;
            case "firstName":
                $this->firstName = $value;
                break;
            case "lastName":
                $this->lastName = $value;
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
            case "streetNumber":
                $this->streetNumber = $value;
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
            case "firstName":
                return $this->firstName;
                break;
            case "lastName":
                return $this->lastName;
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
            case "streetNumber":
                return $this->streetNumber;
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