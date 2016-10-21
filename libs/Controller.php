<?php

/**
*	Main Controller Class 
*/
class Controller
{
	
	function __construct()
	{
		# Instansiating the View part
		$this->view = new View();
	}

	public function loadModel($name){
		$path = 'models/'.$name.'_model.php';
		if(file_exists($path)){
			require $path;
			$modelName = $name.'_model';
			
			$this->model = new $modelName();
			$this->auth = new Authinticate();
		}
	}
}