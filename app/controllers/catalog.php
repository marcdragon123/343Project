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

    protected function add(){
        if(!isset($_SESSION['is_logged_in'])){
            header('Location: '.ROOT_URL.'shares');
        }
        $viewmodel = new CatalogModel();
        $this->returnView($viewmodel->add(), true);
    }
}