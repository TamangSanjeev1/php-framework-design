<?php
	include 'Dbconnect.php';
	include 'Authinticate.php';

	$test = new Authinticate();
	
	session_start();

	if ($_GET['id'] == 1) {
		# code...
		$_SESSION['active'] = 'slider';
	}elseif ($_GET['id'] == 2) {
		# code...
		$_SESSION['active'] = 'home';
	}elseif ($_GET['id'] == 3) {
		$_SESSION['active'] = 'gallery';
	}elseif($_GET['id'] == 4){
		$_SESSION['active'] = 'newsposts';
	}else{
		$_SESSION['active'] = 'timeschedule';
	}
	$test->redirections('../admin/dashboard.php');
?>
	