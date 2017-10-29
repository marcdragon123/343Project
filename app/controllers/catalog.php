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

        if(!empty($_POST)) {
            $viewmodel = new CatalogModel();
            switch ($_POST['productType']) {
                case "desktop":
                    $this->returnView($viewmodel->addComputer(), true);
                    break;
                case "laptop":
                    $this->returnView($viewmodel->addLaptop(), true);
                    break;
                case "tablet":
                    $this->returnView($viewmodel->addTablet(), true);
                    break;
                case "monitor":
                    $this->returnView($viewmodel->addMonitor(), true);
                    break;
            }
        }

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