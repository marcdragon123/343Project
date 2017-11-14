<?php
/**
 * Created by PhpStorm.
 * User: ahmadbiz
 * Date: 2017-11-05
 * Time: 3:05 PM
 */

class User extends Controller {

    private $userMapper;

    public function __construct($action, $request)
    {
        parent::__construct($action, $request);
        $this->userMapper = new CustomerMapper();
    }

    /**
     * this function will instantiate a user object and also push it to the db to get an id for the user
     */
    public function register(){
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if($post['submit']) {
            $userObj = $this->userMapper->create($post);
            header('Location: ' . ROOT_URL . 'users/login');
        }

        $this->returnView(null, true);

    }

    /**
     * this function will call
     */
    public function login(){
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