<?php
//A domain object is a logical container of purely domain information; it usually represents a logical entity in the problem domain space. Commonly referred to as business logic
require_once("Account.php");

class User extends Account {
	//Make sure the capitalization of these matches the ones in DB


	private $StreetName;
    private $StreetNumber;
    private $City;
    private $Province;
    private $Country;
    private $PostalCode;
    private $PhoneNumber;

	function __construct($array) {
		foreach ($array as $key => $value) {
			$this->$key = $value;
		}
	}
	public function getStreetName(){
		return $this->StreetName;
	}
	public function getStreetNumber(){
		return $this->StreetNumber;
	}
	public function getCity(){
		return $this->City;
	}
	public function getProvince(){
		return $this->Province;
	}
	public function getCountry(){
		return $this->Country;
	}
	public function getPostalCode(){
		return $this->PostalCode;
	}
	public function getPhoneNumber(){
		return $this->PhoneNumber;
	}

	public function setStreetName($StreetName){
		$this->StreetName = $StreetName;
	}
	public function setStreetNumber($StreetNumber){
		$this->StreetNumber = $StreetNumber;
	}
	public function setCity($City){
		$this->City = $City;
	}
	public function setProvince($Province){
		$this->Province = $Province;
	}
	public function setCountry($Country){
		$this->Country = $Country;
	}
	public function setPostalCode($PostalCode){
		$this->PostalCode = $PostalCode;
	}
	public function setPhoneNumber($PhoneNumber){
		$this->PhoneNumber = $PhoneNumber;
	}
}