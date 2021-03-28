<?php
interface BasketInterface
{
	public  static function getbasketbyuserid($userid);
	
	
	public function updatebasketitem($basketid,$productid,$qty);
	
	
	public function deletebasketitem($basketid,$productid);
	
	
	public function createbasketitem($basketid,$productid,$qty);
	
	public function getbasketproducts ($basketid);
	
	
	public function clearbasket ($basketid);
	
	public function getbasketidbyuserid ($userid);
	
}
?>