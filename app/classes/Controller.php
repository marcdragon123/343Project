<?php
abstract class Controller{
	protected $request;
	protected $action;
	protected $viewVars;

	public function __construct($action, $request){
		$this->action = $action;
		$this->request = $request;
		$this->viewVars = [];
	}

	public function executeAction(){
		return $this->{$this->action}();
	}

	protected function returnView($viewmodel, $fullview){
		$view = 'views/'. get_class($this). '/' . $this->action. '.php';
		extract($this->viewVars);
		if($fullview){
			require('views/main.php');
		} else {
			require($view);
        }
	}

	//pass variables to respective view, by adding to array
	protected function setVars($varArray){
		foreach ($varArray as $key => $value) {
			$this->viewVars[$key] = $value;
		}
	}

	//sets one variable at a time instead of adding it to an array like above
	protected function setVar($name, $value){
		$viewVars[$name] = $value;
	}
}