<?php
include_once __DIR__ ."/../../../common/src/Service/SecurityService.php";
include_once __DIR__ ."/../../../common/src/Model/User.php";
include_once __DIR__ ."/../../../common/src/Service/UserService.php";
include_once __DIR__ ."/../../../common/src/Service/ExceptionService.php";


class AuthController
{
	private $securityservice;
	 
	public function __construct()
	{
		$this->securityservice = new SecurityService();
	}
	public function check()
	{
		$email = htmlspecialchars($_POST['login']);
		$password = htmlspecialchars($_POST['password']);
		
		$user =(new User())->getbyemail($email);
		
		if(!$this->securityservice->checkpassword($user,$password)){
			throw new Exception('incorrect login or password',403);
			
		}
		
		UserService::saveuserdata([
		
		'id' => $user['id'],
		'login' => $user['email'],
		'role' => json_decode($user['roles'] , true)
		]);
	SecurityService::redirecttostartpage();
	}
	
	public function logout()
	{
		UserService::clear();
		SecurityService::redirecttologinpage();
	}
	
}

?>