<?php
include_once __DIR__ ."/AbstractController.php";
include_once __DIR__ ."/../../../common/src/Model/Payment.php";
include_once __DIR__ ."/../../../common/src/Service/ExceptionService.php";


class PaymentController extends AbstractController
{

	
	public function save()
	{
		
    $shops = new Shop(
	intval($_POST['id']),
	htmlspecialchars ($_POST['title']),
	htmlspecialchars  ($_POST['code']),
	(int) $_POST['priority']
	
	
	);
	$shops->save();
	
	
	
	return $this->read();
	}
	public function create()
	{
	
	
	include_once __DIR__ ."/../../views/payment/form.php";
	}
	public function read()
	{
		
	$all=(new Shop())->all();
	//include_once __DIR__ . "/../../views/product/all.php";
	include_once __DIR__ . "/../../views/payment/list.php";
	}
	public function update()
	{
		$id =(int)$_GET['id'];
		if(empty($id)) die('Undefined ID');
	    $oned =(new Shop())->getById($id);
	if(empty($onep)) die('Delivery has not been sent');
	include_once __DIR__ ."/../../views/payment/form.php";
	}
	public function delete()
	{
		$id=(int)$_GET['id'];
		(new Delivery())->deletebyid($id);
	
	return $this->read();
	}
	
}


?>