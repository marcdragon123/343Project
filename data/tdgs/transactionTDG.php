<?php

class transactionTDG extends model
{

    //public $id_field = "UserId";
    //maybe add here rest of attributes to make sqls easier to eliminate mistakes
    //and make it easier to change one to change all


    public function find($transactionID)
    {
        $this->query('SELECT * FROM `Transaction` WHERE TransactionID = :TransactionID');//query goes here
        $this->bind(':TransactionID', $transactionID);

        return $this->single();
    }


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
        echo $transaction->__get('userEmail');

        $this->execute();


        return $this->lastInsertId();
    }
}

/**

    public function update($transaction)
    {
        $this->query('UPDATE `Transaction` SET `ID`=[value-1],`AccountID`=[value-2],`TotalCost`=[value-3],`TransactionDate`=[value-4],
`TransactionTime`=[value-5],`TransactionType`=[value-6],`productType1`=[value-7],`ProductSerialNumber1`=[value-8],`productType2`=[value-9],
`ProductSerialNumber2`=[value-10],`productType3`=[value-11],`ProductSerialNumber3`=[value-12],`productType4`=[value-13],
`ProductSerialNumber4`=[value-14],`productType5`=[value-15],`ProductSerialNumber5`=[value-16],`productType6`=[value-17],
`ProductSerialNumber6`=[value-18],`productType7`=[value-19],`ProductSerialNumber7`=[value-20],`Email`=[value-21] WHERE 1');


        return $this->lastInsertId();
    }



}*/