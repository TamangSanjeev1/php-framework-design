<?php
include 'routes/Routes.php';

class Authinticate extends Dbconnect{
	private $errors = array();
	private $name;
	private $password; 

	public function checkErrors($formData){
		$requiredFields = array('username','password');
		$counter = 0;
		foreach ($requiredFields as $fields) {
			# code...
			if(empty($formData[$fields])){
				$errors[$counter] = $fields." is required";
				$counter++;
			}	
		}

		if (!isset($errors)) {
			# code...
			return $errors = null;
			
		}

		return $errors;
	}

	public function authinticateUser($formData){
		$connect = parent::connectDb();

		$read = parent::getByUserAndPassword('users',$formData['username'],md5($formData['password']));
		
		$fetch = mysqli_query($connect,$read);
		$count = mysqli_num_rows($fetch);

		if($count > 0){
			while($row = mysqli_fetch_assoc($fetch)){
				session_start();
				$_SESSION['user'] = $row['user_id'];
				$_SESSION['name'] = $row['user_name'];
				$_SESSION['amount'] = $row['balance'];
				$check = $this->redirections("pages/index.php");
			}
		}else{

			return "Wrong User Name or Password";
		}

	}

	public function redirections($insert){
		$route = new Routes(); 

		$route->redirection($insert);	
	}

	public function paymentAuth($formData){
		$connect = parent::connectDb();

		$read = parent::getByUserAndPassword('users',$formData['username'],md5($formData['password']));
		
		$fetch = mysqli_query($connect,$read);
		$count = mysqli_num_rows($fetch);

		if($count > 0){
			while($row = mysqli_fetch_assoc($fetch)){
				session_start();
				$_SESSION['user'] = $row['user_id'];
				$_SESSION['name'] = $row['user_name'];
				$_SESSION['email'] = $row['user_email'];
				$_SESSION['amount'] = $row['balance'];

				if (($_SESSION['amount'] - $_SESSION['total']) < 0) {
					# code...
					$check = $this->redirections("../../order/paymentRedirect/Sorry");
				}else{
					$this->redirections("../../payment/pages/confirmation.php");
				}
			}
		}else{

			return "Wrong User Name or Password";
		}
	}

}

?>