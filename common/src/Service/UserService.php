<?php

class UserService
{
	
	public  static function getcurrentuser()
	{
		$user = $_SESSION['current_user'] ?? null;
		return !empty ($user) ? unserialize ($user)  : [];
		
	}
	public static function saveuserdata($user)
	{
		$_SESSION['current_user'] = serialize($user);
	}
	
	public static function encodepassword($password)
	{
		return md5($password);
	}
	public static function clear()
	{
		unset($_SESSION['current_user'] );
	}
}
?>