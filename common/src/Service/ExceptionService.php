<?php
class ExceptionService
{
	public static function error(Exception $e,$side)
	{
		http_response_code($e->getcode());
		error_log($e->getmessage() . ",file = ProductController.php:18");
		$code=$e->getcode();
		$message=$e->getmessage();
		
		include_once __DIR__ ."/../../../$side/views/exceptions/400.php";
	}
}
?>