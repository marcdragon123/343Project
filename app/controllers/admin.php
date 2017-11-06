<?php
/**
 * Created by PhpStorm.
 * User: ahmadbiz
 * Date: 2017-11-05
 * Time: 3:25 PM
 */

class Admin extends Controller {
    protected $userMapper;

    public function login(){
        $this->userMapper = new CustomerMapper();

    }

    public function logout(){

    }

    public function viewProductCatalog(){

    }

    public function viewProductSpecification($id){

    }



}