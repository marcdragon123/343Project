<?php

/**
 * Created by Marc-Andre Dragon.
 * Date: 2017-11-22
 * Time: 7:08 PM
 */

class ShoppingCartTDG extends model
{
    public function selectAll()
    {
        $this->query('SELECT * FROM TransactionList');
        $tranactions = $this->resultSet();


    }

    //still needs to be worked on
}