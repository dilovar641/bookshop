<?php
include_once __DIR__ ."/../../../common/src/Service/OrderService.php";
include_once __DIR__ ."/../../../common/src/Model/Order.php";
include_once __DIR__ ."/../../../backend/src/Test/AbstractTest.php";
class OrderServiceTest extends AbstractTest
{
	
	public  function testcalctotal()
	{
		$this->copytablebyname('products');
		$orderservice = new OrderService();
		
		$quantityandproducts = (new Order())->getproductsandquantitybyorderid(10);
		
		
			if(!method_exists($orderservice,'calctotal')){
				print "Error:calctotal() is not exist" . PHP_EQL;
				die('test was crashed');
			}
			$total = $orderservice->calctotal($quantityandproducts);
			if(24 !==$total){
				print "Error:calctotal() is not correct" . PHP_EQL;
				die('test was crashed');
			}
	}
}
?>