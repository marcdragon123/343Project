<?php

class Controller{

    private $model;

    //Create controller = Create a model associated to it
    public function __construct($model) {
        $this->model = $model;
    }

    public function index()
    {
        echo 'home/index';
    }
}