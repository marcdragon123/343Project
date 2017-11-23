<?php
/**
 * Created by PhpStorm.
 * users: ahmadbiz
 * Date: 2017-11-05
 * Time: 3:05 PM
 */
class users extends Controller {

    private $obj;

    public function __construct($action, $request)
    {
        parent::__construct($action, $request);
    }

    /**
     * this function will instantiate a users object and also push it to the db to get an id for the users
     */
    public function register(){
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if($post['submit']) {
            $customer = CustomerMapper::getInstance()->create($post);
            if(!is_null($customer)) {
                header('Location: ' . ROOT_URL . 'users/login');
            }
        }
        $this->returnView(null, true);
    }

    /**
     * this function will call
     */
    public function login(){
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if($post['submit']){
            if(CustomerMapper::getInstance()->login($post)){
                header('Location: ' . ROOT_URL . 'catalog');
            }
        }
        $this->returnView(null, true);
    }

    public function logout(){
        var_dump($_SESSION['user_data']);

        CustomerMapper::getInstance()->logout($_SESSION['user_data']['Email']);
        unset($_SESSION['is_logged_in']);
        unset($_SESSION['user_data']);
        session_destroy();
        // Redirect
        header('Location: '.ROOT_URL);
    }

    public function viewProductCatalog(){

    $viewmodel = CatalogMapper::getInstance()->getAllProducts();
    $this->returnView($viewmodel, true);
    }

    public function viewProductSpecification(){

    }

    public function browseCatalog(){
        $products = CatalogMapper::getInstance()->getAllProducts();
        $this->setVars(compact('products'));
        $this->returnView(null, true);
    }
}