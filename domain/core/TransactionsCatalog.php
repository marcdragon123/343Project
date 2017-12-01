<?php

class TransactionsCatalog
{
    protected $transactionsContainer = array();
    public $transactionsFile;

    private static $instance;

    /**
     * @return TransactionsCatalog
     */
    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new TransactionsCatalog();
        }
        return self::$instance;
    }

    private function __construct()
    {
        $this->transactionsFile = new File('transactionsFile.txt');

        $this->transactionsContainer = $this->getTransactionContainer();
    }

    /**
     * @param Transaction $transaction
     * @throws Exception
     */
    public function addTransaction(Transaction $transaction)
    {
        if (isset($this->transactionsContainer[$transaction->__get('transactionID')][$transaction->__get('userEmail')])) {
            throw new Exception("Transaction Number Already Exists");
        }
        $this->transactionsContainer[$transaction->__get('transactionID')][$transaction->__get('userEmail')] = $transaction;
        //var_dump($this->transactionsContainer);
        $this->transactionsFile->write($this->transactionsContainer, true);
    }

    /**
     * @param Transaction $transaction
     * @throws Exception
     */

    public function modifyTransaction(Transaction $transaction)
    {
        if (!isset($this->transactionsContainer[$transaction->__get('transactionID')][$transaction->__get('userEmail')])) {
            throw new Exception("Product is not in the Product Catalog");
        }
        $this->transactionsContainer[$transaction->__get('transactionID')][$transaction->__get('userEmail')] = $transaction;
        $this->transactionsFile->write($this->transactionsContainer, true);
    }

    /**
     * @param Transaction $transaction
     * @throws Exception
     */
    public function deleteTransaction(Transaction $transaction)
    {

        if (!isset($this->transactionsContainer[$transaction->__get('transactionID')][$transaction->__get('userEmail')])) {
            throw new Exception("Product is not in the Product Catalog");
        }
        unset($this->transactionsContainer[$transaction->__get('transactionID')][$transaction->__get('userEmail')]);
        $this->transactionsFile->write($this->transactionsContainer, true);
    }

    /**
     * @param $transactionID
     * @param $userEmail
     * @return Transaction
     * @throws Exception
     */
    public function getTransaction($transactionID, $userEmail){

        if (!isset($this->transactionsContainer[$transactionID][$userEmail])) {
            throw new Exception("Product is not in the Product Catalog");
        }
        return $this->transactionsContainer[$transactionID][$userEmail];
    }

    /**
     * @return mixed
     */
    private function getTransactionContainer()
    {
        $temp = $this->transactionsFile->read($this->transactionsFile->getFileName());
        return $temp[0];
    }

    public function taken($transactionID){
        if (isset($this->transactionsContainer[$transactionID])) {
            return true;
        }
        return false;
    }
}
