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
		$products = $this->model->getItems();
		$this->view->p_list = $products;	
		// print_r($this->view->p_list);	
		$this->view->render('index/index');
	}
}