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

		$products = $this->model->productTypeList();
		$this->view->p_type_list = $products;

		$this->view->company_list = $this->model->companyNameList();	
		// print_r($this->view->p_list);	
		$this->view->render('index/index');
	}

}