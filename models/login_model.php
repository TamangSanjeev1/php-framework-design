<?php
/**
* 
*/
class Login_Model extends Model
{
	function __construct()
	{
		# code...
		parent::__construct();
	}

	public function verify(){
		$query = $this->db->prepare("SELECT user_id,type_id FROM users WHERE email = :email AND user_password = MD5(:password)");
		$query->execute(array(
			':email' => $_POST['email'],
			':password' => $_POST['password']
		));

		$store = $query->fetchAll();
		$this->temp = $store[0][1];
		$count = $query->rowCount();
		if ($count > 0) {
			# code...
			Session::init();
			Session::set('loggedIn',true);
			Session::set('type',$this->temp);
			$_SESSION['user'] = $store[0]['user_id'];
			header('location: ../dashboard');
		}else{
			Session::init();
			$_SESSION['error'] = true;
			header('location: ../login');
		}
	}
}