<?php
/**
 * Created by PhpStorm.
 * greatly improved by anania. with love <3
 * users: ahmadbiz
 * Date: 2017-11-05
 * Time: 2:42 PM
 */

abstract class Account extends DomainObject {

    protected $id;
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

    //add constructor

    /**
     * @return int $id
     */
    public function getID() {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setID($id) {
        $this->id = $id;
    }


    public function __set($name, $value) {
        $this->$name = $value;
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