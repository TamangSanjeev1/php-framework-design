<?php
/**
* 
*/
class Dashboard_Model extends Model
{
	function __construct()
	{
		# code...
		parent::__construct();
	}

	public function createUser(){
		$type = 2;
		$time = date('Y-M-d');
	
		$query = $this->db->prepare("INSERT INTO users(user_name, user_password, email, phone_number, address, date_added, type_id) VALUES (:name,md5(:password),:email,:ph_number,:address,:date_added,:type)");
		$query->execute(array(':name' => $_POST['fname'], ':password' => $_POST['password'], ':email' => $_POST['email'], ':ph_number' => $_POST['number'], ':address' => $_POST['address'], ':date_added' => $time, ':type' => $type));	
	}

	function listUsers(){
		$sth = $this->db->query('SELECT * FROM users');
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute();
		$data = $sth->fetchAll();
		// return json_encode($data);
		return $data;
	}

	function deleteUsers($id){
		$query = $this->db->prepare("DELETE FROM users WHERE user_id = :id");
		$query->execute(array(
				'id' => $id
			));
	}
}