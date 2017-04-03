<?php

class Dbconnect{
	public function connectDb(){
		return mysqli_connect('localhost', 'root', '', 'paymentgateway');
	}

	public function getByUserAndPassword($tablename,$username,$password){
		return "SELECT user_id,user_name,user_email,user_password,user_address, bank_accno, IFNULL(balance,0) balance FROM $tablename WHERE user_email = '$username' AND user_password = '$password'";
	}		
	
}

?>
