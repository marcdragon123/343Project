<?php
/**
 * Created by PhpStorm.
 * User: leban
 * Date: 2017-11-02
 * Time: 9:31 PM
 */

class app{

    //Initialize
    protected $controller = 'home';
    protected $method = 'index';
    protected $params = [];

    //ex: Array ( [0] => Home [1] => Controller [2] => Model)
    public function __construct(){
        $url = $this->getUrl();

        //Checks if controller exists in controllers directory
        if(file_exists('../controllers/'.$url[0].'.php')){
            $this->controller = $url[0];
            unset($url[0]);
        }
        //If exists -> Controller, else -> home (default) controller
        require_once '../app/controllers/'.$this->controller.'.php';
        $this->controller = new $this->controller;

        if(isset($url[1])){
            // for Url: ex: /home(CONTROLLER)/index(FUNCTION)
            if(method_exists($this->controller, $url[1])){
                $this->method = $url[1];
                unset($url[1]);
            }

        }
        //Re base the Indexes: Restart $url array.. [0] => param, not home
        //If method doesnt exist, send to an empty array
        $this->params = $url ? array_values($url) : [];

        call_user_func_array([$this->controller, $this->method], $this->params);


    }


    public function getUrl(){

        if(isset($_GET['url'])){

            return $url = explode('/', filter_var(trim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        }
        else{
            //If url was not found
        }
    }

}