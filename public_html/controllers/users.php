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
                header('Location: ' . ROOT_URL . 'users/viewProductCatalog');
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
        $viewmodel = CatalogMapper::getInstance()->getAllProductsAvailable();
        $this->returnView($viewmodel, true);
    }

    /**
     * @param array $arr
     * @return Product
     */
    public static function objectify(array $arr){
        foreach ($arr as $prod){
            return $prod;
        }
    }

    public function viewSpecs(){
        $viewmodel = CatalogMapper::getInstance()->getProductSpecification($_GET['ProductType'],$_GET['SerialNumber'] );
        $post = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);

        if(CatalogMapper::getInstance()->isAvailable($viewmodel)){
            $this->returnView($viewmodel, true);
        }
        else{
            Messages::setMsg("This can't be accessed because someone's already viewing this file.", '');
            header("Location: ".ROOT_URL."users/viewProductCatalog");
        }

        if(!empty($post)){
            if(!($_SESSION['user_data']['Type']==='A')){
                Messages::setMsg('Only customers may add products to their cart','');
            }
            else{

            }
        }
    }

    public function browseCatalog(){
        $viewmodel = CatalogMapper::getInstance();

        $this->returnView($viewmodel,true);
    }

    public function pingProduct(){
        $get = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);


        if($get && isset($get["ProductType"]) && isset($get["SerialNumber"])){
            $product = CatalogMapper::getInstance()->getProductSpecification($get["ProductType"], $get["SerialNumber"]);
            if(isset($get["update"]) && $_SESSION['user_data']['Type']==="A"){
                CatalogMapper::getInstance()->setTimer($product);
            }
            else{
                if(!CatalogMapper::getInstance()->isAvailable($product)){
                    Messages::setMsg("An admin took over this page, try to access it again in few minutes.", '');
                    echo "tookover";
                }
            }
        }

    }


}