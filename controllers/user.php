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

	function updateCompImage($id){
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
					header('location: ../userProfile');
				}else{
					$temp = MassUpload::fileExist();
					if ($temp === false) {
						# code...
						$_SESSION['error'] = "Sorry, file already exists.";
						header('location: ../userProfile');
					}else{
						$temp = MassUpload::fileSize();
						if ($temp === false) {
							# code...
							$_SESSION['error'] = "Sorry, your file is too large.";
							header('location: ../userProfile');
						}else{
							//
							$temp = MassUpload::fileFormats();
							if ($temp === false ) {
								# code...
								$_SESSION['error'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
								header('location: ../userProfile');
							}else{
									
									$imgname = $this->model->updateCompImage($id);
									$i = 0;
									foreach ($imgname as $value) {
										# code...
										$store[] = 'public/images/company-img/'.$imgname[$i][0];
										$temp[] = str_replace(' ', '', $store[$i]);
										$i++;
									}
									// print_r($store);
									foreach ($temp as $value) {
										# code...
								  		unlink($value);
									}
									//send the image
									# code...
									$_SESSION['error'] = 'Successfully Added';
									header('location: ../userProfile');
								// $temp = MassUpload::checkErrors("galleries");
								// $errors = $temp;
							}
						}
					}
				}
				// $this->model->storeItem();
			}else{
				$_SESSION['error'] = 'Please select an image to upload'; 
				header('location: ../userProfile');
			}
		}

	}

	function additems(){
		$this->itemType = $this->model->itemType();
		$this->view->types = $this->itemType;
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

	// function deleteUsers($id){
	// 	$this->model->deleteUsers($id);
	// 	header('location: ../../dashboard');
	// }

	function deleteItem($id){
		$imgname = $this->model->deleteItem($id);
		// print_r($imgname);
		$i = 0;
		foreach ($imgname as $value) {
			# code...
			$store[] = 'public/images/product-details/'.$imgname[$i][0];
			$temp[] = str_replace(' ', '', $store[$i]);
			$i++;
		}
		// print_r($store);
		foreach ($temp as $value) {
			# code...
	  		unlink($value);
		}

		header('location: ../../user/listitems');
	}

	function editProduct($id){
		$this->list = $this->model->itemType();
		$this->view->types = $this->list;
		$this->list = $this->model->listItem($id);
		$this->view->itemList = $this->list;
		$this->view->render('dashboard/pages/editproduct',1);
	}

	function updateProduct($id){
		if($_POST){			
			$this->model->updateProduct($id);	
			header('location: ../listItems');
		}else{
			header('location: ../listItems');
		}
				// print_r($_POST);
				// $this->profile = $this->model->updateProfile($id);	
	}

	function listItems(){
		$this->list = $this->model->listItems();
		$this->view->itemList = $this->list;
		// $this->cat = $this->model->itemType();
		// $this->view->category = $this->cat;
		$this->view->render('dashboard/pages/listitems',1);
	}

	function featuredItems($id){
		$this->list = $this->model->featuredItems($id);
		if ($this->list === 0 || $this->list != '') {
			# code...
			$_SESSION['error'] = "You already have added this item";
			header('location: ../listItems');	
		}elseif($this->list >= 5){
			$_SESSION['error'] = "The maximum size is six";
			header('location: ../listItems');
		}else{
			$_SESSION['error'] = "Successfully Added";	
			header('location: ../listItems');
		}
	}

	function featuredItemsList(){
		$this->featuredproducts = $this->model->getFeaturedItems();
		$this->view->itemList = $this->featuredproducts; 
		// print_r($this->view->itemList);
		$this->view->render('dashboard/pages/listfeatureditems',1);
	}


	function deleteFeaturedItem($id){
		$this->featuredproducts = $this->model->deleteFeaturedItem($id);
		header('location: ../featuredItemsList');
	}

	function producttype(){
		$this->view->typeList = $this->model->productTypeList();

		$this->view->render('dashboard/pages/productType',1);
	}

	function addproducttype(){
		$this->model->addproducttype();

		header('location: producttype');
	}

	function deleteProductType($id){
		$this->model->deleteProductType($id);
		header('location: ../producttype');
	}

	function logout(){
 		Session::destroy();
 		header('location: ../login');
 	}
}