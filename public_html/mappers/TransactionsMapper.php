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


    public function __construct()
    {
        //$this->transactionsTDG = new transactionTDG();
        $this->transactionsCatalog = TransactionsCatalog::getInstance();
        $this->shoppingCart = new ShoppingCart();
    }


    public function addToCart($product){
        var_dump($_SESSION['cart']);
        if(isset($_SESSION['cart'])){
            $this->shoppingCart = $_SESSION['cart'];
            try{
                $this->shoppingCart->addToCart($product);
            }catch (Exception $exception){
                Messages::setMsg($exception->getMessage(),'error');
            }
        }
        else{
            $this->shoppingCart = new ShoppingCart();
            try{
                $this->shoppingCart->addToCart($product);
            }catch (Exception $exception){
                Messages::setMsg($exception->getMessage(),'error');
            }
            $_SESSION['cart'] = $this;

        }
        return;
    }

    public function removeFromCart($product){
        if(isset($_SESSION['cart'])){
            $this->shoppingCart = $_SESSION['cart'];
            try{
                $this->shoppingCart->removeFromCart($product);
            }catch (Exception $exception){
                Messages::setMsg($exception->getMessage(),'error');
            }
        }
        else{
            Messages::setMsg('Your cart is empty', 'error');
        }
    }

    public function viewCart(){
        if(isset($_SESSION['cart'])){
            $this->shoppingCart = $_SESSION['cart'];
            try{
                $this->shoppingCart->getCartProducts();
            }
            catch (Exception $exception){
                Messages::setMsg($exception->getMessage(),'error');
            }
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