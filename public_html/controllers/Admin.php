<?php
/**
 * Anania
 */
class admin extends Controller {

    public function __construct($action, $request) {
        parent::__construct($action, $request);
    }

    public function Index(){
        $viewmodel = AdminMapper::getInstance();
        $this->returnView($viewmodel, true);
    }

    /**
     * this function will instantiate a users object and also push it to the db to get an id for the users
     */
    public function register() {
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if($post['submit']) {
            $customer = CustomerMapper::getInstance()->create($post);
            if(!is_null($customer)) {
                header('Location: ' . ROOT_URL . 'admin/adminlogin');
            }
        }
        $this->returnView(null, true);
    }

    /**
     * this function will call
     */
    public function adminlogin(){
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if($post['submit']){
            if(AdminMapper::getInstance()->login($post)){
                header('Location: ' . ROOT_URL . 'admin');
            }
        }
        $this->returnView(null, true);
    }

    public function logout(){
        $email = $_SESSION['user_data']['Email'];
        $ID = $_SESSION['user_data']['UserID'];
        $viewModel = AdminMapper::getInstance()->logout($email);
        unset($_SESSION['is_logged_in']);
        unset($_SESSION['user_data']);
        session_destroy();
        // Redirect
        header('Location: '.ROOT_URL.'home');
    }

    public function viewProductCatalog(){

    }

    public function viewProductSpecification() {

    }

    public function addProduct() {
        if(!isset($_SESSION['is_logged_in'])){
            header('Location: '.ROOT_URL.'home');
        }
        if(!($_SESSION['user_data']['Type']==='A')){
            header('Location: '.ROOT_URL.'home');
        }

        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if(!empty($post)){
            //var_dump($_POST);
            if(CatalogMapper::getInstance()->create($post)){
                header('Location: '.ROOT_URL. 'admin');
            }
        }
        $this->returnView(null, true);



    }

}