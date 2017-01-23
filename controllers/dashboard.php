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
		//if (isset($_POST)) {
			// code...

		//	$this->model->createUser();
		//}

		// print_r($_FILES);
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