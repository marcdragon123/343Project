<?php

class TransactionsCatalog
{
    protected $transactionsContainer = array();
    public $transactionsFile;

    private static $instance;

    /**
     * @return ProductCatalog
     */
    public static function getInstance()
    {
        if (self::$instance === null) {
        }
        return self::$instance;
    }

    private function __construct()
    {
        $this->transactionsFile = new File('transactionsFile.txt');

        $this->transactionsContainer = $this->getProductContainer();
    }

    /**
     * @param Transaction $transaction
     * @throws Exception
     */
    public function add(Transaction $transaction)
    {
        if (isset($this->productContainer[$transaction->__get('ProductType')][$transaction->__get('SerialNumber')])) {
            throw new Exception("Product Serial Number Already Exists");
        }
        $this->transactionsContainer[$transaction->__get('ProductType')][$transaction->__get('SerialNumber')] = $transaction;
        $this->transactionsFile->write($this->transactionsContainer, true);
    }

    /**
     * @param Transaction $transaction
     * @throws Exception
     */

    public function modifyProduct(Transaction $transaction)
    {
        if (!isset($this->productContainer[$transaction->__get('ProductType')][$transaction->__get('SerialNumber')])) {
            throw new Exception("Product is not in the Product Catalog");
        }
        $this->transactionsContainer[$transaction->__get('ProductType')][$transaction->__get('SerialNumber')] = $transaction;
        $this->transactionsFile->write($this->transactionsContainer, true);
    }

    /**
     * @param Transaction $transaction
     * @throws Exception
     */
    public function deleteProduct(Transaction $transaction)
    {

        if (!isset($this->transactionsContainer[$transaction->__get('ProductType')][$transaction->__get('SerialNumber')])) {
            throw new Exception("Product is not in the Product Catalog");
        }
        unset($this->transactionsContainer[$transaction->__get('ProductType')][$transaction->__get('SerialNumber')]);
    }

    /**
     * @param $transactionID
     * @return Transaction
     * @throws Exception
     */
    public function getProduct($transactionID){

        if (!isset($this->productContainer[$transactionID])) {
            throw new Exception("Product is not in the Product Catalog");
        }
        return $this->transactionsContainer[$transactionID];
    }

    /**
     * @return mixed
     */
    private function getProductContainer()
    {
        $temp = $this->transactionsFile->read($this->transactionsFile->getFileName());
        return $temp[0];
    }
}
