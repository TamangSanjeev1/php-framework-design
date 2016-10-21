<?php

/**
* 
*/
class User extends Controller
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
		$this->view->render('dashboard/user',1);
	}

	function additems(){
		$this->view->render('dashboard/pages/additems',1);
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