<?php 

class Controller {

	//this should contain all the values needed from the global post array
	//without accessing the global array
	private $post = array();

	//Controller constructer
	public function __construct($array) {
		foreach ($array as $key) {
    		array_push($post,$this->getPost($key));
		}
	}

	//return post value
	public function getPost($value){
		return $_POST[''.$value.''];
	}
  
	//sending code to model
   	public function givesData($model){
  		$model.updateData($post);
  	}

}

