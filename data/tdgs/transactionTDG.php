<?php

class transactionTDG extends model
{

    //public $id_field = "UserId";
    //maybe add here rest of attributes to make sqls easier to eliminate mistakes
    //and make it easier to change one to change all

    /**
     * @param $email
     * @return mixed
     */
    public function find($email)
    {
        $this->query('SELECT * FROM `Transaction` WHERE Email = :Email');//query goes here
        $this->bind(':Email', $email);
        return $this->resultSet();
    }

    /**
     * @param Transaction $transaction
     * @return string
     */
    public function insert($transaction)
    {
        $this->query('INSERT INTO `Transaction` (TransactionID,TotalCost , productType1, ProductSerialNumber1,
                productType2, ProductSerialNumber2, productType3, ProductSerialNumber3, productType4, ProductSerialNumber4, productType5,
                ProductSerialNumber5, productType6, ProductSerialNumber6, productType7, ProductSerialNumber7, Email) VALUES
                (:TransactionID, :TotalCost , :productType1, :ProductSerialNumber1, :productType2,
                 :ProductSerialNumber2, :productType3, :ProductSerialNumber3, :productType4, :ProductSerialNumber4, :productType5,
                  :ProductSerialNumber5, :productType6, :ProductSerialNumber6, :productType7, :ProductSerialNumber7, :Email) ');
        $this->bind(':TotalCost', $transaction->__get('totalCost'));
        $this->bind(':TransactionID', $transaction->__get('transactionID'));
        $this->bind(':productType1', $transaction->__get('productType1'));
        $this->bind(':ProductSerialNumber1', $transaction->__get('serialNumber1'));
        $this->bind(':productType2', $transaction->__get('productType2'));
        $this->bind(':ProductSerialNumber2', $transaction->__get('serialNumber2'));
        $this->bind(':productType3', $transaction->__get('productType3'));
        $this->bind(':ProductSerialNumber3', $transaction->__get('serialNumber3'));
        $this->bind(':productType4', $transaction->__get('productType4'));
        $this->bind(':ProductSerialNumber4', $transaction->__get('serialNumber4'));
        $this->bind(':productType5', $transaction->__get('productType5'));
        $this->bind(':ProductSerialNumber5', $transaction->__get('serialNumber5'));
        $this->bind(':productType6', $transaction->__get('productType6'));
        $this->bind(':ProductSerialNumber6', $transaction->__get('serialNumber6'));
        $this->bind(':productType7', $transaction->__get('productType7'));
        $this->bind(':ProductSerialNumber7', $transaction->__get('serialNumber7'));
        $this->bind(':Email', $transaction->__get('userEmail'));

        $this->execute();


        return $this->lastInsertId();
    }

    /**
     * @param Transaction $transaction
     * @return string
     */
    public function update($transaction)
    {
        $this->query('UPDATE `Transaction` SET TotalCost=:TotalCost , productType1=:productType1, ProductSerialNumber1=:ProductSerialNumber1,
                productType2=:productType2, ProductSerialNumber2=:ProductSerialNumber2, productType3=:productType3, ProductSerialNumber3=:ProductSerialNumber3,
                 productType4=:productType4, ProductSerialNumber4=:ProductSerialNumber4, productType5=:productType5, ProductSerialNumber5=:ProductSerialNumber5,
                  productType6=:productType6, ProductSerialNumber6=:ProductSerialNumber6, productType7=:productType7, ProductSerialNumber7=:ProductSerialNumber7 WHERE TransactionID = :TransactionID');
        $this->bind(':TransactionID', $transaction->__get('transactionID'));
        $this->bind(':TotalCost', $transaction->__get('totalCost'));
        $this->bind(':productType1', $transaction->__get('productType1'));
        $this->bind(':ProductSerialNumber1', $transaction->__get('serialNumber1'));
        $this->bind(':productType2', $transaction->__get('productType2'));
        $this->bind(':ProductSerialNumber2', $transaction->__get('serialNumber2'));
        $this->bind(':productType3', $transaction->__get('productType3'));
        $this->bind(':ProductSerialNumber3', $transaction->__get('serialNumber3'));
        $this->bind(':productType4', $transaction->__get('productType4'));
        $this->bind(':ProductSerialNumber4', $transaction->__get('serialNumber4'));
        $this->bind(':productType5', $transaction->__get('productType5'));
        $this->bind(':ProductSerialNumber5', $transaction->__get('serialNumber5'));
        $this->bind(':productType6', $transaction->__get('productType6'));
        $this->bind(':ProductSerialNumber6', $transaction->__get('serialNumber6'));
        $this->bind(':productType7', $transaction->__get('productType7'));
        $this->bind(':ProductSerialNumber7', $transaction->__get('serialNumber7'));

        $this->execute();

        return $this->lastInsertId();
    }

    /**
     * @param Transaction $transaction
     */
    public function delete($transaction){
        $this->query('DELETE FROM `Transaction` WHERE TransactionID = :TransactionID');
        $this->bind(':TransactionID', $transaction->__get('transactionID'));
        $this->execute();
    }
}

