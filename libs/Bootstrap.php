<?php
 /**
 * 	This is the bootstrap class
 */
 class Bootstrap
 {
 	
 	function __construct()
 	{
 		# code...
 		if(!empty($_GET['url'])){
 			Session::init();
 			$url = $_GET['url'];
		 	$url = rtrim($url,'/');
			$url = explode('/', $url);
			
			$file = 'controllers/'.$url[0].'.php';
			
			if (file_exists($file)) {
				# code...
				require $file;	
			}else{
				$this->errorPage();
				return false; 
			}

			$controller = new $url[0];
			try{
				$controller->loadModel($url[0]);	
			}catch(Error $e){

			}

			#checking if the url for controller isset
			try{
				if (isset($url[2])) {
				# Calling the function
				$controller->{$url[1]}($url[2]);

				}else if (isset($url[1])) {
					#checking if the url for controller isset
						# Calling the function
					$controller->{$url[1]}();
				}else{
					$controller->index();
				}
			}catch(Error $e){
				$this->errorPage();
				return false; 
			}					
		}else{
			require 'controllers/index.php';
			$controller = new Index();
			$controller->index();
			exit;
		}
 	}

 	function errorPage(){
 		require 'controllers/errors.php';
		$controller = new Errors();
		$controller->index();
 	}
 }