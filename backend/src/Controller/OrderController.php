<?php
include_once __DIR__ ."/AbstractController.php";
include_once __DIR__ ."/../../../common/src/Model/Order.php";
include_once __DIR__ ."/../../../common/src/Model/Orderitem.php";
include_once __DIR__ ."/../../../common/src/Service/OrderService.php";


class OrderController extends AbstractController
{

	public function save()
	{
	//todo
	}
	
	public function create()
	{
	 $onep = [];
	
	include_once __DIR__ ."/../../views/orders/form.php";
	}
	public function read()
	{
		
	$all=(new Order())->all();
	//include_once __DIR__ . "/../../views/product/all.php";
	include_once __DIR__ . "/../../views/orders/list.php";
	}
	
	public function update()
	{
		if(!empty($_POST)){
			$id = (int)$_POST['id'];
			$delivery =(int)$_POST['delivery'];
			$payment =(int)$_POST['payment'];
			$name = htmlspecialchars( $_POST['name']);
			$phone = htmlspecialchars( $_POST['phone']);
			$email = htmlspecialchars( $_POST['email']);
			$status = (int)$_POST['status'];
			$updated = date('y-m-d h:i:s',time());
			
			$total = 0;
			
			if($id>0){
				(new Order($id,  null  ,$payment,$delivery,$total,"",$name,$phone,$email,$status,
			$updated))->update();
			}
			header("location: /backend/?model=order&action=read");
		}
		$onen = (new Order(""))->getbyid((int)$_GET['id']);
	include_once __DIR__ . "/../../views/orders/form.php";
	}
	
	public function delete()
	{
		//todo
	}
	
	
}


?>