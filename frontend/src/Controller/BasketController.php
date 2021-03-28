<?php

include_once __DIR__ ."/../../../common/src/Service/BasketService.php";
include_once __DIR__ ."/../../../common/src/Service/BasketDBService.php";
include_once __DIR__ ."/../../../common/src/Service/BasketSessionService.php";
include_once __DIR__ ."/../../../common/src/Service/BasketCookieService.php";
include_once __DIR__ ."/../../../common/src/Service/UserService.php";
include_once __DIR__ ."/../../../common/src/Service/ProductService.php";
include_once __DIR__ ."/../../../common/src/Model/Basketitem.php";
include_once __DIR__ ."/../../../common/src/Model/Product.php";
include_once __DIR__ ."/../../../common/src/Service/ExceptionService.php";

class BasketController
{
	public $user;
	public $basket;
	public $items;
	public $basketservice;
	public function __construct()
	{
		$this->user=UserService::getcurrentuser();
		if(!isset($this->user['login'])){
			throw new Exception('NO PERMISSION',403);
		}
		
		
		
		$this->basket = BasketDBService::getbasketbyuserid($this->user['id']);
		
		$this->basketservice = new BasketDBService();
		//$this->basketservice = new BasketSessionService();
		//$this->basketservice = new BasketCookieService();
		$this->items = $this->basketservice->getbasketproducts((int)$this->basket['id']);
	}
	public function addProduct()
	{
		$productid =(int)$_POST['product_id'];
		$qty =(int)$_POST['quantity'];
		
		if(empty($productid) || empty($qty)){
			throw new Exception ("empty product");
		}
		
		
		 foreach($this->items as $item){
			 if($item['product_id'] == $productid){
				 
				 
		$this->basketservice->updatebasketitem($this->basket['id'],$productid,$qty);
		
		
		$this->redirecttobasket();
		die();
			 }
		 }
		
		$this->basketservice->createbasketitem($this->basket['id'],$productid,$qty);
		$this->redirecttobasket();
		
	}
	public function view()
	{
		
		$result=(new ProductService())->getbasketitems($this->items);
		$items= $result['items'];
		$total = $result['total'];
		include_once __DIR__ ."/../../views/basket/view.php";
	}
		public function delete()
	{
		
		$this->basketservice->deletebasketitem((int)$this->basket['id'],(int)$_POST['product_id']);
		$this->redirecttobasket();
	}
	public function change()
	{
		
			$this->basketservice->updatebasketitem((int)$this->basket['id'],(int)$_POST['product_id'],(int)$_POST['qty']);
		
		$this->redirecttobasket();
	}
	public function redirecttobasket()
	{
		header("location:/frontend/?model=basket&action=view");
	}
}

?>