<?php

/**
* 
*/
class Help extends Controller
{
	
	function __construct()
	{
		# code...
		parent::__construct();
	}

	public function create($args = false){
		require 'models/help_model.php';
		$this->model = new Help_Model();
	}
}



