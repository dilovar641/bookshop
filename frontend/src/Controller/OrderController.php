<?php
include_once __DIR__ . "/../../../common/src/Service/OrderService.php";
include_once __DIR__ . "/../../../common/src/Service/UserService.php";
include_once __DIR__ . "/../../../common/src/Service/BasketCookieService.php";
include_once __DIR__ . "/../../../common/src/Service/BasketDBService.php";
include_once __DIR__ . "/../../../common/src/Service/ExceptionService.php";
include_once __DIR__ . "/../../../common/src/Model/Order.php";
include_once __DIR__ . "/../../../common/src/Model/Orderitem.php";

class OrderController
{
	
	private $basketservice;
	
	public function __construct()
	{    
	     
		$this->basketservice = new BasketDBService();
		//$this->basketservice = new BasketCookieService();
	}
	public function index()
	{
		include_once __DIR__ ."/../../views/order/form.php";
	}
	
	public function create()
	{
		
		$name = htmlspecialchars($_POST['name']);
		$phone = htmlspecialchars($_POST['phone']);
		$email = htmlspecialchars($_POST['email']);
		$delivery=(int)$_POST['delivery'];
		$payment=(int)$_POST['payment'];
		$comment = htmlspecialchars($_POST['comment']);
		$userid=UserService::getcurrentuser()['id'] ?? 0;
		$total = 0;
		$status = OrderService::STATUS_NEW;
		$updated = date('y-m-d h:i:s', time());
		
		$order = new Order(
		null ,
		$userid,
		$payment,
		$delivery,
		$total,
		$comment,
		$name,
		$phone,
		$email,
		$status,
		$updated);
		
		$orderid = $order->save();
		if(empty($orderid)){
			throw new Exception ("orderid is null",400);
		}
		
		$basketid = $this->basketservice->getbasketidbyuserid($userid);
		$items = $this->basketservice->getbasketproducts($basketid);
		
		if(empty($items)){
			throw new Exception ("basket is empty",400);
		}
			foreach($items as $item){
				$orderitem = new Orderitem($orderid,(int)$item['product_id'],(int)$item['quantity']);
				$orderitem->save();
			}
			
			//clear basket
			
			$this->basketservice->clearbasket($basketid);
			header("location:/frontend/?model=order&action=success&order_id=" . $orderid);
			
		}
		public function success()
		{
			$orderid = (int)$_GET['order_id'];
			include_once __DIR__ ."/../../views/order/success.php";
		}
	}

?>