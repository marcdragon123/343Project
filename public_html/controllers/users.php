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

    }

    public function viewProductCatalog(){

    }

    public function viewProductSpecification(){

    }

    public function browseCatalog(){
        $viewmodel = CatalogMapper::getInstance();

        $this->returnView($viewmodel->selectAll(),true);
    }



}