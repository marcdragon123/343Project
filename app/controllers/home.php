<?php
/**
 * Created by PhpStorm.
 * User: leban
 * Date: 2017-11-02
 * Time: 9:38 PM
 */
require 'Controller.php';

class home extends Controller
{
    //$var is a variable passed in the Url
    // /controller/function/var1/var2
    public function index($var='', $var2=''){
    $home = $this->model('home');
    }

    public function test(){

    }
}