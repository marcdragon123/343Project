<?php
/**
 * Created by PhpStorm.
 * User: ahmadbiz
 * Date: 2017-11-24
 * Time: 3:56 PM
 */

class TransactionsMapper extends MapperAbstract
{
    protected $transactionsTDG;
    protected $transactionsCatalog;
    protected $shoppingCart;
    protected $cartIdMap;
    protected $userEmail;


    public function __construct()
    {
        $this->transactionsCatalog = TransactionsCatalog::getInstance();
        $this->userEmail = $_SESSION['user_data']['Email'];
        $this->cartIdMap = ShoppingCartIdMap::getInstance();
        $this->shoppingCart = $this->cartIdMap->get($this->userEmail);
        if(is_null($this->shoppingCart)){
            $this->shoppingCart = new ShoppingCart();
        }
    }


    public function addToCart($product){
        try{
            $this->shoppingCart->addToCart($product);
            $this->cartIdMap->add($this->shoppingCart, $this->userEmail);
            var_dump($this->shoppingCart);
            return ;
        }catch (Exception $exception){
            Messages::setMsg($exception->getMessage(),'error');
        }
    }

    public function removeFromCart($product){
        try{
            $this->shoppingCart->removeFromCart($product);
            $this->cartIdMap->add($this->shoppingCart, $this->userEmail);
        }
        catch (Exception $exception){
            Messages::setMsg($exception->getMessage(), 'error');
        }
    }

    public function viewCart(){
        try{
            //$cartView = $this->shoppingCart->getCartProducts();
            return $this->shoppingCart;
        }catch (Exception $exception){
            Messages::setMsg($exception->getMessage(), 'error');
        }
    }

    public function _update($obj)
    {
        // TODO: Implement _update() method.
    }
    public function _create($type = null)
    {
        // TODO: Implement _create() method.
    }

    public function _delete($obj)
    {
        // TODO: Implement _delete() method.
    }

    public function _insert($obj)
    {
        // TODO: Implement _insert() method.
    }

    public function create(array $data = null)
    {

    }


    public function objectify(){

    }
}