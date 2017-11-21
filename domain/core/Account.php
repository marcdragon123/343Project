<?php
/**
 * Created by PhpStorm.
 * greatly improved by anania. with love <3
 * then reverted by ahmad :( </3
 * re-reverted by anania :D
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
            case "LoginStatus":
                if($this->LoginStatus === false){
                    $this->LoginStatus = $value;
                }
                $this->LoginStatus = false;
                break;
            default:
                $this->$name = $value;
                break;
        }
    }

    /**
     * @param $name
     * @return int $id
     *
     */
    public function __get($name) {
        return $this->$name;
    }

}