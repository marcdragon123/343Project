<?php
/**
 * Created by PhpStorm.
 * User: ahmadbiz
 * Date: 2017-11-05
 * Time: 3:05 PM
 */

class User extends Controller {

    protected $userMapper;

    /**
     * this function will instantiate a user object and also push it to the db to get an id for the user
     */
    public function register(){
        $this->userMapper = new CustomerMapper();
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $userObj = $this->userMapper->create($post);
        $userId = $this->userMapper->createAccount($post);
        $this->userMapper->initializeId($userObj, $userId);
        
        $this->returnView(header('Location: '.ROOT_URL.'users/login'), true);
    }

    /**
     * this function will call
     */
    public function login(){
        $this->userMapper = new CustomerMapper();
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $this->userMapper->findByEmail();
    }

    public function logout(){

    }

    public function viewProductCatalog(){

    }

    public function viewProductSpecification(){

    }


}