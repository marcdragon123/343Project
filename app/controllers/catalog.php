<?php

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

    protected function editProduct(){
        $viewmodel = new CatalogModel();
        $this->returnView($viewmodel->editProduct(), true);
    }

    protected function removeProduct(){
        $viewmodel = new CatalogModel();
        $this->returnView($viewmodel->removeProduct(), true);
    }

    protected function viewProductDDetails(){
        $viewmodel = new CatalogModel();
        $this->returnView($viewmodel->viewProductDDetails(), true);
    }

}