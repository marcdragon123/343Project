<?php
/**
 * Anania
 */
class admin extends Controller {

    private $obj;

    public function __construct($action, $request) {
        parent::__construct($action, $request);
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
                header('Location: ' . ROOT_URL . 'admin/adminCatalog');
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

    public function adminCatalog(){
        $viewmodel = CatalogMapper::getInstance();
        return $this->returnView($viewmodel, true);

    }



}