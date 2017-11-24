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
    protected $cart;


    public function __construct()
    {
        $this->transactionsTDG = new transactionTDG();
        $this->transactionsCatalog = TransactionsCatalog::getInstance();
    }


    public function createCart(){
        $this->cart = new ShoppingCart();
    }

}