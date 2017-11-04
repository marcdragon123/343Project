<?php 
require_once('../Config.php');
require_once('../models/User.php');
require_once('Controller.php');
require_once('../core/Gateways/userTable.php');


$array = array("Email","Password");
$controller = new Controller($array);

$model = new Model();
$controller->givesData($model);  
$db = new Database();
$model->update($db);

$userTable = new userTable();
$user = new User();
$userTable->populateUser($user);
echo "hello!";
print_r($user->getFirstName());




/*$db = new App\Config();
if($db->connect()){

	//if we want gateway, do this there (UsersTable.php)
	$result = $db->authenticate($_POST['email'], $_POST['password']);
	if($result){
		$user = new User($result);
		echo ("Login Success: HI " . $user->getFirstName());

		//login user (set user session)
	} else {
		echo ("Login Failed");
		//redirect to login page, with errors
	}
		
}else{
	echo 'could not connect';
}
*/