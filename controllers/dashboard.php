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
		$notice = $this->model->getStockNotification();
		// $this->view->notify = $notice;
		$_SESSION['notify'] = $notice; 
		$this->view->check = $this->listUsers();

		 if (Session::get('type') == 1) {
	            # code...
	            $this->view->render('dashboard/admin/index',1);
	        }elseif (Session::get('type') == 2) {
	            # code...
	           	header("Location: user/index");
	        }
	}

	function adduser(){
		$this->view->render('dashboard/pages/adduser',1);
	}

	function viewUsers(){
		$this->view->check = $this->listUsers();
		$this->view->render('dashboard/pages/viewusers',1);
	}

	function editUsers($id){
		$this->view->check = $this->model->userData($id);
		$this->view->render('dashboard/pages/edituser',1);
	}

	function updateUser($id){
		if($_POST){
			if(!empty($_POST['password'])){
				$this->profile = $this->model->updateUser($id,$_POST['password']);	
				header('location: ../viewusers');
			}else{
				// print_r($_POST);
				$this->profile = $this->model->updateUser($id);	
				header('location: ../viewusers');
			}
		}else{
			header('location: viewUsers');
		}
	}


	function createUser(){
		if (isset($_POST) && !empty($_POST)) {
			// code...
			if(isset($_FILES) && !empty($_FILES["fileToUpload"]["name"][0])){
				$destination = 'public/images/company-img/';
				$file = $_FILES;
				$post = $_POST;
				new MassUpload($destination,$file,$post);

				$temp = MassUpload::checkImg();

				if ($temp === false) {
					# code...
					$_SESSION['error'] = "File is not an Image";
					header('location: adduser');
				}else{
					$temp = MassUpload::fileExist();
					if ($temp === false) {
						# code...
						$_SESSION['error'] = "Sorry, file already exists.";
						header('location: adduser');
					}else{
						$temp = MassUpload::fileSize();
						if ($temp === false) {
							# code...
							$_SESSION['error'] = "Sorry, your file is too large.";
							header('location: adduser');
						}else{
							//
							$temp = MassUpload::fileFormats();
							if ($temp === false ) {
								# code...
								$_SESSION['error'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
								header('location: adduser');
							}else{
									$this->model->createUser();
									
									# code...
									$_SESSION['error'] = 'Successfully Added';
									header('location: adduser');
						
							}
						}
					}
				}
			
			}else{
				$_SESSION['error'] = 'Please select an image to upload'; 
				header('location: adduser');
			}
		}
	}

	function deleteUsers($id){
		$imgname = $this->model->deleteUsers($id);
		$store = 'public/images/company-img/'.$imgname[0][0];
		$temp = str_replace(' ', '', $store);
	  	unlink($temp);


		header('location: ../../dashboard/viewusers');
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