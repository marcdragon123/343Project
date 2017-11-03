<?php
/**
 * Created by PhpStorm.
 * User: leban
 * Date: 2017-11-02
 * Time: 7:09 PM
 */

class View
{
    private $model;
    private $controller;

    public function __construct($controller,$model) {
        $this->controller = $controller;
        $this->model = $model;
    }




}