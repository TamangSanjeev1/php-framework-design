<?php
/**
* 
*/
class View 
{
	
	function __construct()
	{
		# code...
	}

	public function render($name, $value = 0,$noInclude = false){
		if($noInclude == true){
			require 'views/'.$name.'.php';	
		}elseif($value == 1){
			require 'views/dashboard/header/header.php';
			require 'views/'.$name.'.php';
			require 'views/dashboard/footer/footer.php';
		}else{
			require 'views/header.php';
			require 'views/'.$name.'.php';
			require 'views/footer.php';	
		}
	}
}