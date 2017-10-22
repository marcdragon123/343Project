<?php
/**
 * Created by PhpStorm.
 * User: ahmadbiz
 * Date: 2017-10-20
 * Time: 11:23 PM
 */

class Catalog extends Controller{
    protected function Index(){
        $viewmodel = new CatalogModel();
        $this->returnView($viewmodel->Index(), true);
    }

    protected function addProduct(){
        if(!isset($_SESSION['is_logged_in'])){
            header('Location: '.ROOT_URL.'home');
        }
        $viewmodel = new CatalogModel();
        $this->returnView($viewmodel->addProduct(), true);
    }

    protected function addProduct(){

    }

    protected function editProduct(){

    }

    protected function removeProduct(){

    }

    protected function viewProductDDetails(){

    }

}