<?php
include_once __DIR__ ."/../../../common/src/Model/Product.php";
include_once __DIR__ ."/../../../common/src/Service/UserService.php";

class siteController
{
	public function index()
	{
	
		header("location:/backend/?model=product&action=read");
		die();
	}
	
	public function  login()
	{
		
		include_once __DIR__ . "/../../views/site/login.php";
	}
	
	
}


?>