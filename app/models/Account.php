<?php

/**
 * Created by Marc-Andre Dragon.
 * Date: 2017-11-16
 * Time: 12:32 AM
 */
abstract class Account
{
    private $UserID;
    private $Password;
    private $Admin;

    private $FirstName;
    private $LastName;
    private $Email;


    public function getUserID(){
        return $this->UserID;
    }
    public function getPassword(){
        return $this->Password;
    }
    public function getAdmin(){
        return $this->Admin;
    }
    public function getFirstName(){
        return $this->FirstName;
    }
    public function getLastName(){
        return $this->LastName;
    }
    public function getEmail(){
        return $this->Email;
    }

    public function setID($ID){
        $this->UserID = $ID;
    }
    public function setPassword($password){
        $this->Password = $password;
    }
    public function setAdmin($Admin){
        $this->Admin = $Admin;
    }
    public function setFirstName($FirstName){
        $this->FirstName = $FirstName;
    }
    public function setLastName($LastName){
        $this->LastName = $LastName;
    }
    public function setEmail($Email){
        $this->Email = $Email;
    }
}