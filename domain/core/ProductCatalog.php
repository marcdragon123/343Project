<?php
/**
 * Created by PhpStorm.
 * User: ahmadbiz
 * Date: 2017-11-05
 * Time: 3:33 PM
 */

class ProductCatalog extends DomainObject {
    protected $productMapper;

    public function __construct($type){
        switch ($type){
            case "laptop":
                $this->product = new LaptopMapper();
                break;
            case "desktop":
                $this->product = new DesktopMapper();
                break;
            case "monitor":
                $this->product = new MonitorMapper();
                break;
            case "tablet":
                $this->product = new TabletMapper();
                break;
        }
    }

    public function addProduct(){
        //TODO: check for type of product, then map it to appropriate

    }

    public function editProductSpecification($id, $specification){

    }

    public function deleteProductSpecification($id, $specification){

    }

    public function addProductSpecification($id, $specification){

    }

    public function viewProductCatalog(){

    }

    public function deleteProductCatalog(){

    }



}