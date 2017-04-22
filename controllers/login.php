<?php 
/**
 * 
 */
 class Login extends Controller
 {
 	function __construct(){
 		parent::__construct();
 	}

 	function index(){
 		$this->view->login('login/index');
 	}

 	function verify(){
 		$this->model->verify();
 	}
 } 