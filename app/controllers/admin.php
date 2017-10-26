<?php

class Admin extends Controller{
    protected function Index(){
        $viewmodel = new CatalogModel();
        $this->returnView($viewmodel->Index(), true);
    }

    protected function adminLogin(){
        $viewmodel = new AdminModel();
        //Create variables here and pass them to view, Uncomment the following to try out
        //$apple = 'iPhone 5';
        //$samsung = 'galaxy edge';
        //$this->setVars(compact('apple', 'samsung'));
        //$this->setVar('apple', $apple);
        //$this->setVar('samsung', $samsung);
        $this->returnView($viewmodel->adminLogin(), true);
    }

    protected function logout(){
        $email = $_SESSION['user_data']['Email'];
        $ID = $_SESSION['user_data']['ID'];
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
        $this->returnView($viewmodel->userProfile(), true);    }

    protected function addProduct(){
        $viewmodel = new CatalogModel();
        $this->returnView($viewmodel->userProfile(), true);
    }
}