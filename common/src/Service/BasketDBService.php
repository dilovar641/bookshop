<?php
include_once __DIR__ ."/../Model/Basket.php";
include_once __DIR__ ."/../Model/Basketitem.php";
include_once __DIR__ ."/../Service/BasketService.php";

  class BasketDBService   extends BasketService
{
	public  static function getbasketbyuserid($userid)
	  {
		$basket = new Basket($userid);
		if($basket->getfromdb($userid)== null){
			$basket->userid=$userid;
			$basket->save();
		}
		return $basket->getfromdb();
	}
	public function updatebasketitem($basketid,$productid,$qty)
	{
		(new Basketitem($basketid,$productid,$qty))->update();
	}
	
	public function deletebasketitem($basketid,$productid)
	{
		(new Basketitem())->deleteproductbybasketid($productid,$basketid);
	}
	
	public function createbasketitem($basketid,$productid,$qty)
	{
		$item = new Basketitem();
		$item->basketid=$basketid;
		$item->productid=$productid;
		$item->quantity=$qty;
		$item->save();
	}
	public function getbasketproducts($basketid)
	{
		return(new Basketitem())->getbyBasketid($basketid);
	}
	public function clearbasket($basketid)
	{
		(new Basketitem())->clearbybasketid($basketid);
	}
	
	public function   getbasketidbyuserid($userid)
	{
		return (new Basket($userid))->getfromdb()['id'];
	}
}
?>