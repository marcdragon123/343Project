<?php
class Users extends Controller{
	protected function register(){
		$viewmodel = new UserModel();
		$this->returnView($viewmodel->register(), true);
	}

	protected function login(){
		$viewmodel = new UserModel();
		//Create variables here and pass them to view, Uncomment the following to try out
		//$apple = 'iPhone 5';
		//$samsung = 'galaxy edge';
		//$this->setVars(compact('apple', 'samsung'));
		//$this->setVar('apple', $apple);
		//$this->setVar('samsung', $samsung);
		$this->returnView($viewmodel->login(), true);
	}

	protected function logout(){
	    $email = $_SESSION['user_data']['Email'];
	    $ID = $_SESSION['user_data']['account_ID'];
	    $viewModel = new UserModel();
	    $viewModel->logoutStatus($email, $ID);
		unset($_SESSION['is_logged_in']);
		unset($_SESSION['user_data']);
		session_destroy();
		// Redirect
		header('Location: '.ROOT_URL);
	}

    protected function userProfile(){

        $viewmodel = new UserModel();
        $this->returnView($viewmodel->userProfile(), true);
    }
}
