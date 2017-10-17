<?php 
require_once('../Config.php');


$db = new App\Config();
if($db->connect()){
	if($db->authenticate($_POST['email'], $_POST['password'])){
		echo ("Login Success");
	} else {
		echo ("Login Failed");
	}
		
}else{
	echo 'could not connect';
}

