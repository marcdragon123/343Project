<?php

class CatalogModel extends Model{
    public function Index(){
        $this->query('SELECT * FROM account_tbl ORDER BY ID DESC'); //query goes here
        $rows = $this->resultSet();
        return $rows;
    }

    public function addProduct(){
        return ;

    }

    public function editProduct(){

    }

    public function removeProduct(){

    }

    public function viewProductDDetails(){

    }

}
