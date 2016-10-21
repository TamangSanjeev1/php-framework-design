<?php
/**
* 
*/
class Session
{
	private static $user_type;

	public static function init(){
		@session_start();
	}

	public static function set($key, $value){
		$_SESSION['$key'] =  $value;
	}

	public static function get($key){
		if (isset($_SESSION['$key'])) {
			# code...
			return $_SESSION['$key'];
		}
	}

	public static function setType($type){
		$this->user_type = $type;
	}

	public static function getType(){
		return $this->user_type;
	}

	public static function destroy(){
		session_destroy();
	}
}