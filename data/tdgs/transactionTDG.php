<?php

class transactionTDG extends model
{
    //public $id_field = "UserId";
    //maybe add here rest of attributes to make sqls easier to eliminate mistakes
    //and make it easier to change one to change all

    /**
     * fetch single users from DB by email
     * @param $transactionID
     *
     * @return array
     */
    public function find($transactionID) {
        $this->query('SELECT * FROM account WHERE TransactionID = :TransactionID');//query goes here
        $this->bind(':TransactionID', $transactionID);

        return $this->single();
    }

    /**
     * @param Transaction object
     * @return string
     */
    public function insert($transaction)
    {  /*
        $this->query('INSERT INTO `Transaction` (`TotalCost`, `TransactionDate`, `TransactionTime`, `TransactionType`,
 `productType1`, `ProductSerialNumber1`, `productType2`, `ProductSerialNumber2`, `productType3`, `ProductSerialNumber3`, `productType4`,
  `ProductSerialNumber4`, `productType5`, `ProductSerialNumber5`, `productType6`, `ProductSerialNumber6`, `productType7`, `ProductSerialNumber7`,
   `Email`) VALUES ');/*
        $this->bind(':FirstName', $user->__get('FirstName'));
        $this->bind(':LastName', $user->__get('LastName'));
        $this->bind(':Email', $user->__get('Email'));
        $this->bind(':PhoneNumber', $user->__get('PhoneNumber'));
        $this->bind(':Password', $user->__get('Password'));
        $this->bind(':StreetName', $user->__get('StreetName'));
        $this->bind(':StreetNumber', $user->__get('StreetNumber'));
        $this->bind(':City', $user->__get('City'));
        $this->bind(':Province', $user->__get('Province'));
        $this->bind(':Country', $user->__get('Country'));
        $this->bind(':PostalCode', $user->__get('PostalCode'));
*/

        $this->execute();


        return $this->lastInsertId();
    }

    /**
     * @param Transaction $transaction
     * @return string id
     */

    public function update($transaction)
    {  /*
        $this->query('UPDATE `Transaction` SET `ID`=[value-1],`AccountID`=[value-2],`TotalCost`=[value-3],`TransactionDate`=[value-4],
`TransactionTime`=[value-5],`TransactionType`=[value-6],`productType1`=[value-7],`ProductSerialNumber1`=[value-8],`productType2`=[value-9],
`ProductSerialNumber2`=[value-10],`productType3`=[value-11],`ProductSerialNumber3`=[value-12],`productType4`=[value-13],
`ProductSerialNumber4`=[value-14],`productType5`=[value-15],`ProductSerialNumber5`=[value-16],`productType6`=[value-17],
`ProductSerialNumber6`=[value-18],`productType7`=[value-19],`ProductSerialNumber7`=[value-20],`Email`=[value-21] WHERE 1');


        return $this->lastInsertId();      */ 
    }



}