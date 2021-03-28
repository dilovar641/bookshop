<?php
include_once __DIR__ ."/../Model/Basket.php";
include_once __DIR__ ."/../Model/Basketitem.php";
include_once __DIR__ ."/../Service/BasketService.php";

class BasketCookieService extends BasketService
{
	const TIME_EXPIRED = 3600;
      public function getbasketproducts($basketid)
	 
	 {
		$data =  $_COOKIE['basket'] ?? [];
		if(empty($data) && sizeof($data) == 0){
			return $data;
		}
		return unserialize($data);
	 }
	 
	public  static function getbasketbyuserid($userid)
	{
		
	}
	
	public function updatebasketitem($basketid,$productid,$qty)
	{
		$data = $this->getbasketproducts($basketid);
		foreach ($data as $key => $item){
			if($item['product_id'] ===$productid){
				$data[$key]['quantity'] = $qty;
		}
	}
	$this->save($data);
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
		$data = $this->getbasketproducts($basketid);
	   $data[] = $item;
	  $this->save($data);
	}
	public function save($data)
	{
		 setcookie('basket',serialize ($data),time() + self::TIME_EXPIRED);
	}
	public function clearbasket($basketid)
	{
		
	}
	
	public function   getbasketidbyuserid($userid)
	{
		
	}
}
?>