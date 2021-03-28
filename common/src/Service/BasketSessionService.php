<?php
include_once __DIR__ ."/../Model/Basket.php";
include_once __DIR__ ."/../Model/Basketitem.php";
include_once __DIR__ ."/../Service/BasketService.php";

class BasketSessionService extends BasketService
{
     public function getbasketproducts($basketid)
	 
	 {
		$session =  $_SESSION['basket'] ?? [];
		if(empty($session) && sizeof($session) == 0){
			return $session;
		}
		return unserialize($session);
	 }
	 
	public static function getbasketbyuserid($userid)
	{
		
	}
	
	public function updatebasketitem($basketid,$productid,$qty)
	{
		
	}
	
	public function deletebasketitem($basketid,$productid)
	{
		
	}
	
	public function createbasketitem($basketid,$productid,$qty)
	{
		$item =[
		'product_id'=>$productid,
		'basket_id'=>$basketid,
		'quantity'=>$qty
		
		];
		$session = $this->getbasketproducts($basketid);
	   $session[] = $item;
	   $_SESSION['basket'] = serialize($session);
	}
	
	public function clearbasket($basketid)
	{
		
	}
	
	public function   getbasketidbyuserid($userid)
	{
		
	}
}
?>