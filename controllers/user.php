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

	function userProfile(){
		$this->profile = $this->model->userProfile();
		$this->view->usrProfile = $this->profile;
		$this->view->render('dashboard/pages/userprofile',1);
	}

	function editProfile(){
		$this->profile = $this->model->userProfile();
		$this->view->usrProfile = $this->profile;
		$this->view->render('dashboard/pages/editprofile',1);	
	}

	function updateProfile($id){
		if($_POST){
			if(!empty($_POST['password'])){
				$this->profile = $this->model->updateProfile($id,$_POST['password']);	
				header('location: ../userProfile');
			}else{
				// print_r($_POST);
				$this->profile = $this->model->updateProfile($id);	
				header('location: ../userProfile');
			}
		}else{
			header('location: editProfile');
		}
	}

	function additems(){
		$this->view->render('dashboard/pages/additems',1);
	}

	function storeItem(){

		if (isset($_POST) && !empty($_POST)) {
			// code...
			if(isset($_FILES) && !empty($_FILES["fileToUpload"]["name"][0])){
				$destination = 'public/images/product-details/';
				$file = $_FILES;
				$post = $_POST;
				new MassUpload($destination,$file,$post);

				$temp = MassUpload::checkImg();

				if ($temp === false) {
					# code...
					$_SESSION['error'] = "File is not an Image";
					header('location: additems');
				}else{
					$temp = MassUpload::fileExist();
					if ($temp === false) {
						# code...
						$_SESSION['error'] = "Sorry, file already exists.";
						header('location: additems');
					}else{
						$temp = MassUpload::fileSize();
						if ($temp === false) {
							# code...
							$_SESSION['error'] = "Sorry, your file is too large.";
							header('location: additems');
						}else{
							//
							$temp = MassUpload::fileFormats();
							if ($temp === false ) {
								# code...
								$_SESSION['error'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
								header('location: additems');
							}else{
									$this->model->storeItem();
									# code...
									$_SESSION['error'] = 'Successfully Added';
									header('location: additems');
								// $temp = MassUpload::checkErrors("galleries");
								// $errors = $temp;
							}
						}
					}
				}
				// $this->model->storeItem();
			}else{
				$_SESSION['error'] = 'Please select an image to upload'; 
				header('location: additems');
			}
		}
	}

	function deleteUsers($id){
		$this->model->deleteUsers($id);
		header('location: ../../dashboard');
	}

	function listItems(){
		$this->list = $this->model->listItems();
		$this->view->itemList = $this->list;
		$this->view->render('dashboard/pages/listitems',1);
	}

	function logout(){
 		Session::destroy();
 		header('location: ../login');
 	}
}