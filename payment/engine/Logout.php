<?php
	include '../engine/Dbconnect.php';
	include '../engine/Authinticate.php';
	session_start();
	session_destroy();

	$redirect = new Authinticate;
	$redirect->redirections("../pages");
?>