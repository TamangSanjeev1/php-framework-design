<?php

/**
* 
*/
class Index extends Controller
{
	
	function __construct()
	{
		# code...
		parent::__construct();
	}

	function index(){
		$this->view->render('index/index');
	}
}