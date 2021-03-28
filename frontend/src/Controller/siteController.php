<?php
include_once __DIR__ ."/../../../common/src/Model/Product.php";
include_once __DIR__ ."/../../../common/src/Service/UserService.php";
class siteController
{
	public function index()
	{
		// $currentuser=UserService::getcurrentuser();
		// print_r($currentuser);
		
	
		$all=(new Product())->all();
		include_once __DIR__ . "/../../views/site/index.php";
	}
	
	public function  login()
	{
		
		include_once __DIR__ . "/../../views/site/login.php";
	}
	
	
}


?>