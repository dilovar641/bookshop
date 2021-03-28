<?php
include_once __DIR__ ."/Interface/ControllerInterface.php";
include_once __DIR__ ."/../../../common/src/Service/SecurityService.php";
include_once __DIR__ ."/../../../common/src/Service/UserService.php";
include_once __DIR__ ."/../../../common/src/Service/ExceptionService.php";
include_once __DIR__ ."/../../../common/src/Model/User.php";

abstract class  AbstractController implements ControllerInterface
{
	public function __construct()
	{
		
		    if(!SecurityService::isauthorized()){
			header("location:/backend/?model=site&action=login");
			die();
		}
		$currentuser = UserService::getcurrentuser();
		$model = htmlspecialchars($_GET['model']);
		$action = htmlspecialchars($_GET['action']);
		//$permission = SecurityService::getpermissionnamebycontrollerandaction($model,$action);
		
	   (new User())->isaccess($currentuser['role'],$model,$action);
	}
	}


?>