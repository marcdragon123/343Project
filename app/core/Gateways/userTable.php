<?php
require 'Gateway.php';


class userTable extends Gateway {


	public function populateUser($user, $email) {

		$sql = "SELECT * FROM account WHERE Email=$email";

		$sqlArray = array();
		$sqlArray = $sql->mysqli_fetch_all();
		print_r($sqlArray);

/*
		$user->setID($sqlArray->['UserID']);
		$user->setPassword($sqlArray->[0]['Password']);
		$user->setAdmin($sqlArray->[0]['Admin']);
		$user->setFirstName($sqlArray->[0]['FirstName']);
		$user->setLastName($sqlArray->[0]['LastName']);
		$user->setEmail($sqlArray->[0]['Email']);
		$user->setStreetName($sqlArray->[0]['StreetName']);
		$user->setStreetNumber($sqlArray->[0]['StreetNumber']);
		$user->setCity($sqlArray->[0]['City']);
		$user->setProvince($sqlArray->[0]['Province']);
		$user->setCountry($sqlArray->[0]['Country']);
		$user->setPostalCode($sqlArray->[0]['PostalCode']);
		$user->setPhoneNumber($sqlArray->[0]['PhoneNumber']);
*/
	}





	public function dirtyObject($user){

	}

	public function cleanObject($user){

	}

	public function registerNew($user){

	}

	public function registerDeleted($user){

	}



}