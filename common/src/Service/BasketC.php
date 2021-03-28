<?php
include_once __DIR__ ."/../Model/Basket.php";
include_once __DIR__ ."/../Model/Basketitem.php";
include_once __DIR__ ."/../Interfaces/BasketInterface.php";

class BasketSessionService implements BasketInterface
{
     public function getbasketproducts($basketid)
	 
	 {
		$session =  $_SESSION['basket'] ?? [];
		if(empty($session) && sizeof($session) == 0){
			return $session;
		}
		return unserialize($session);
	 }
	 
	public function getbasketbyuserid($userid)
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
}
?>