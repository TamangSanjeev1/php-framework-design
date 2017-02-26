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
		$this->view->render('index/index');
	}

	function viewproducts($id){
		// $this->model->addViewCount($id);
		$product = $this->model->viewProduct($id);
		$this->view->product_info = $product;
		$this->view->render('product_pages/view_product');
	}
	
	function productbyType($id){		
		$this->view->company_list = $this->model->companyNameList();
		$products = $this->model->productTypeList();
		$this->view->p_type_list = $products;

		$products = $this->model->getItemsByType($id);
		$this->view->p_list = $products;	
		$this->view->render('product_pages/product_bytype');
	}
}