<?php
//A domain object is a logical container of purely domain information; it usually represents a logical entity in the problem domain space. Commonly referred to as business logic

class User{
	//Make sure the capitalization of these matches the ones in DB
	private $account_ID;
	private $Password;
	private $Admin;

	private $FirstName;
	private $LastName;
	private $Email;

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

	public function getAccount_ID(){
		return $this->account_ID;
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


	public function setID($ID){
		$this->account_ID = $account_ID;
	}
	public function setPassword($password){
		$this->Password = $Password;
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