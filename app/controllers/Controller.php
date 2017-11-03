<?php
/**
 * Created by PhpStorm.
 * User: leban
 * Date: 2017-11-03
 * Time: 12:15 AM
 */

class Controller
{
    public function model($model){
        //require_once ('../Models/' .$this->model . '.php');
        return new $model();
    }

}