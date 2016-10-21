<?php

/**
* 
*/
class Dashboard extends Controller
{
	
	function __construct()
	{
		# code...
		parent::__construct();
		Session::init();
		$status = Session::get('loggedIn');
		if($status == false){
			Session::destroy();
			header('Location: login');
			exit;
		}
	}

	function index(){
		$this->view->check = $this->listUsers();
		$this->view->render('dashboard/index',1);
	}

	function adduser(){
		$this->view->render('dashboard/pages/adduser',1);
	}

	function createUser(){
		if (isset($_POST)) {
			// code...
			$this->model->createUser();
		}
	}

	function deleteUsers($id){
		$this->model->deleteUsers($id);
		header('location: ../../dashboard');
	}

	function listUsers(){
		$this->list = $this->model->listUsers();
		return $this->list;
	}

	function logout(){
 		Session::destroy();
 		header('location: ../login');
 	}
}