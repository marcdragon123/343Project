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

        if(!empty($_POST)) {
            $viewmodel = new CatalogModel();
            switch (true) {
                case isset($_POST['computer']):
                    $this->returnView($viewmodel->addComputer(), true);
                    break;
                case isset($_POST['laptop']):
                    $this->returnView($viewmodel->addLaptop(), true);
                    break;
                case isset($_POST['tablet']):
                    $this->returnView($viewmodel->addTablet(), true);
                    break;
                case isset($_POST['monitor']):
                    $this->returnView($viewmodel->addMonitor(), true);
                    break;
                case isset($_POST['desktop']):
                    $this->returnView($viewmodel->addDesktop(), true);
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