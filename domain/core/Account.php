<?php
/**
 * Created by PhpStorm.
 * greatly improved by anania. with love <3
 * then reverted by ahmad :( </3
 * 
 */

abstract class Account extends DomainObject {

    protected $UserID;
    protected $Type;
    protected $FirstName;
    protected $LastName;
    protected $Password;
    protected $Email;
    protected $PhoneNumber;
    protected $StreetNumber;
    protected $StreetName;
    protected $City;
    protected $Province;
    protected $PostalCode;
    protected $Country;
    protected $LoginStatus;

    //add constructor

    /**
     * @return int $id
     */
    public function getID() {
        return $this->UserID;
    }

    /**
     * @param int $id
     */
    public function setID($id) {
        $this->UserID = $id;
    }


    public function __set($name, $value) {

        switch ($name){
            case "Type":
                $this->Type = $value;
                break;
            case "FirstName":
                $this->FirstName = $value;
                break;
            case "LastName":
                $this->LastName = $value;
                break;
            case "Password":
                $this->Password = $value;
                break;
            case "Email":
                $this->Email = $value;
                break;
            case "PhoneNumber":
                $this->PhoneNumber = $value;
                break;
            case "StreetNumber":
                $this->StreetNumber = $value;
                break;
            case "StreetName":
                $this->StreetName= $value;
                break;
            case "City":
                $this->City= $value;
                break;
            case "Province":
                $this->Province= $value;
                break;
            case "Country":
                $this->Country= $value;
                break;
            case "LoginStatus":
                $this->LoginStatus= $value;
                break;
            case "PostalCode":
                $this->PostalCode = $value;
                break;
        }
    }

    /**
     * @param $name
     * @return int $id
     *
     */
    public function __get($name) {
        switch ($name){
            case "Type":
                return $this->Type;
                break;
            case "FirstName":
                return $this->FirstName;
                break;
            case "LastName":
                return $this->LastName;
                break;
            case "Password":
                return $this->Password;
                break;
            case "Email":
                return $this->Email;
                break;
            case "PhoneNumber":
                return $this->PhoneNumber;
                break;
            case "StreetNumber":
                return $this->StreetNumber;
                break;
            case "StreetName":
                return $this->StreetName;
                break;
            case "City":
                return $this->City;
                break;
            case "Province":
                return $this->Province;
                break;
            case "Country":
                return $this->Country;
                break;
            case "PostalCode":
                return $this->PostalCode;
                break;
            case "LoginStatus":
                return $this->LoginStatus;
                break;
        }
    }

}