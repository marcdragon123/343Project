<?php
/**
 * Created by PhpStorm.
 * users: ahmadbiz
 * Date: 2017-11-05
 * Time: 3:05 PM
 */
class users extends Controller {

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

    public function deleteUser(){
        CustomerMapper::getInstance()->deleteCustomer($_SESSION['user_data']['Email']);
        unset($_SESSION['is_logged_in']);
        unset($_SESSION['user_data']);
        session_destroy();
        header('Location: ' . ROOT_URL );

    }


    public function viewProductCatalog(){

        $viewmodel = CatalogMapper::getInstance()->getAllProductsAvailable();
        if(!is_null($viewmodel)){
            $this->returnView($viewmodel, true);
        }
        else{
            Messages::setMsg('Product Catalog is empty', 'error');
        }
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

    public function viewSpecs()
    {
        $viewmodel = CatalogMapper::getInstance()->getProductSpecification($_GET['ProductType'], $_GET['SerialNumber']);

        if (CatalogMapper::getInstance()->isAvailable($viewmodel)) {
            $this->returnView($viewmodel, true);
        } else {
            Messages::setMsg("This can't be accessed because someone's already viewing this file.", '');
            //header("Location: " . ROOT_URL . "users/viewProductCatalog");
        }

        if($_POST){
            if ($_SESSION['is_logged_in']) {
                if (!($_SESSION['user_data']['Type'] === 'A')) {
                    try{
                        CatalogMapper::getInstance()->addToCart($viewmodel);
                    }catch (Exception $exception){
                        Messages::setMsg('Product Already Added to Cart', 'error');
                    }
                }else{
                    Messages::setMsg('Only customers may add products to their cart', '');
                }
            }else{
                Messages::setMsg('You must be logged in to cart', 'error');
            }
        }
    }

    public function cart()
    {
        $viewmodel = CatalogMapper::getInstance()->viewCart();
        try{
            $viewmodel->getCartProducts();
        }catch (Exception $exception){
            Messages::setMsg($exception->getMessage(), '');
        }
        $this->returnView($viewmodel, true);

        $get = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);

        if ($get && isset($get["ProductType"]) && isset($get["SerialNumber"])) {
            if(CatalogMapper::getInstance()->removeFromCart($get["ProductType"], $get["SerialNumber"])){
                header('Location: ' . ROOT_URL. 'users/cart');
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
                }
            }
        }

    }

    public function checkout(){
        $viewmodel = CatalogMapper::getInstance()->checkout();
        $this->returnView($viewmodel, true);
    }

    public function returns(){
        if(!isset($_SESSION['is_logged_in'])) {
            Messages::setMsg('Must Log in for returns', '');
            header('Location: '. ROOT_URL. 'users/login');
        }
        $email = $_SESSION['user_data']['Email'];
        $viewmodel = CatalogMapper::getInstance()->getAllTransactions($email);
        $this->returnView($viewmodel, true);
    }

    public function viewTransaction(){
        $email = $_SESSION['user_data']['Email'];
        $viewmodel = CatalogMapper::getInstance()->getTransaction($_GET['transactionID'], $email);

        $this->returnView($viewmodel, true);

        $get = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);

        if ($get && isset($get["ProductType"]) && isset($get["SerialNumber"]) && isset($get["transactionID"])) {
            CatalogMapper::getInstance()->returnProduct($get["ProductType"], $get["SerialNumber"]);
            CatalogMapper::getInstance()->modifyTransaction($get['transactionID'], $email,$get["ProductType"], $get["SerialNumber"]);
            header('Location: ' . ROOT_URL. 'users/returns');
        }
    }

}