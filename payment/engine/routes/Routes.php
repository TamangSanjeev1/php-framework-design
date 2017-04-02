<?php
class Routes{
	public function redirection($path){
		header("Location:{$path}");
		exit();
	}	
}

?>