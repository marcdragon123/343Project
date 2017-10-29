<?php

class CatalogModel extends Model{
    public function Index(){
        $this->query('SELECT * FROM account_tbl ORDER BY ID DESC'); //query goes here
        $rows = $this->resultSet();
        return $rows;
    }

    public function addProduct(){
        return;
    }

    public function addLaptop(){
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        if($post['submit']){
            if($post['productType'] == '' || $post['serialNum'] == ''){
                Messages::setMsg('Please Fill In All Fields', 'error');
                return;
            }
            // Insert into MySQL
            $this->query('INSERT INTO product_tbl (productType, serialNum) VALUES(:productType, :serialNum)');
            $this->bind(':productType', $post['productType']);
            $this->bind(':serialNum', $post['serialNum']);
            $this->execute();
            //$this->query('INSERT INTO ')
            // Verify
            if($this->lastInsertId()){
                // Redirect
                header('Location: '.ROOT_URL.'catalog');
            }
        }
        return;

    }

    public function addMonitor(){
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        if($post['submit']){

            // Insert into MySQL
            $this->query('INSERT INTO product_tbl (productType, serialNum) VALUES(:productType, :serialNum)');
            $this->bind(':productType', $post['productType']);
            $this->bind(':serialNum', $post['serialNum']);
            $this->execute();
            //$this->query('INSERT INTO ')
            // Verify
            if($this->lastInsertId()){
                // Redirect
                header('Location: '.ROOT_URL.'catalog');
            }
        }
        return;

    }

    public function addTablet(){
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        if($post['submit']){
            if($post['productType'] == '' || $post['serialNum'] == ''){
                Messages::setMsg('Please Fill In All Fields', 'error');
                return;
            }
            // Insert into MySQL
            $this->query('INSERT INTO product_tbl (productType, serialNum) VALUES(:productType, :serialNum)');
            $this->bind(':productType', $post['productType']);
            $this->bind(':serialNum', $post['serialNum']);
            $this->execute();
            //$this->query('INSERT INTO ')
            // Verify
            if($this->lastInsertId()){
                // Redirect
                header('Location: '.ROOT_URL.'shares');
            }
        }
        return;

    }

    public function addDesktop(){
        /*$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        if($post['submit']){
            if($post['productType'] == '' || $post['quantity'] == ''){
                Messages::setMsg('Please Fill In All Fields', 'error');
                return;
            }
            // Insert into MySQL
            $this->query('INSERT INTO product_tbl (productType, Quantity) VALUES(:productType, :quantity)');
            $this->bind(':productType', $post['productType']);
            $this->bind(':quantity', $post['quantity']);
            $this->execute();
            //$this->query('INSERT INTO ')
            // Verify
            if($this->lastInsertId()){
                // Redirect
                header('Location: '.ROOT_URL.'admin');
            }
        }*/
        return;

    }


    public function editProduct(){

    }

    public function removeProduct(){

    }

    public function viewProductDDetails(){

    }

}
