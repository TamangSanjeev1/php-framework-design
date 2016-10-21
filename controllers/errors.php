<?php

/**
* 
*/
class Errors extends Controller
{
	
	function __construct()
	{
		# code...
		parent::__construct();
	}

	function index(){
		$this->view->render('error/index');
	}
}