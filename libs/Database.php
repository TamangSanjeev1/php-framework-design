<?php
/**
* 
*/
class Database extends PDO
{
	
	function __construct()
	{
		# code...
		//parent::__construct('mysql:host=localhost,dbname=FYP','root','');
		
		parent::__construct(DB_CRED,DB_USER,DB_PASSWORD);
	}

}