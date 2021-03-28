<?php
include_once __DIR__ ."/UserService.php";
class SecurityService
{
	public function checkpassword($user,$password)
	{
		
		if(empty($user)){
			throw new Exception ('user not found',404);
		}
		if(UserService::encodepassword($password) !== $user['password']){
			throw new Exception ('incorrect password',400);
		}
		return true;
	}
	public  static function redirecttostartpage()
	{
		header("location:/backend/");
		die();
	}
	
	public  static function redirecttologinpage()
	{
		header("location:/frontend/?model=site&action=login");
		die();
	}
	public static function isauthorized()
	{
		if(empty(UserService::getcurrentuser())) return false;
		return true;
	}
	public static function getpermissionnamebycontrollerandaction($controller,$action)
	{
		return strtoupper($controller) . '_' . strtoupper($action);
	}
}
?>