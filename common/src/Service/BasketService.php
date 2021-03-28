<?php

include_once __DIR__ ."/../Interfaces/BasketInterface.php";

 abstract class BasketService   implements BasketInterface
{
	abstract public  static function getbasketbyuserid($userid);
	
	
	abstract public function updatebasketitem($basketid,$productid,$qty);
	
	abstract public function deletebasketitem($basketid,$productid);
	
	
	abstract public function createbasketitem($basketid,$productid,$qty);
	
	abstract public function getbasketproducts($basketid);
	
	
	abstract public function clearbasket($basketid);
	
	abstract public function  getbasketidbyuserid ($userid);
	
}
?>