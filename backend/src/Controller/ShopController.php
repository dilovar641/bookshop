<?php
include_once __DIR__ ."/AbstractController.php";
include_once __DIR__ ."/../../../common/src/Model/Shop.php";


class ShopController extends AbstractController
{

	
	public function save()
	{
		
    $shops = new Shop(
	intval($_POST['id']),
	htmlspecialchars ($_POST['title']),
	htmlspecialchars  ($_POST['address'])
	
	
	);
	$shops->save();
	
	
	
	return $this->read();
	}
	public function create()
	{
	
	
	include_once __DIR__ ."/../../views/shop/form.php";
	}
	public function read()
	{
		
	$all=(new Shop())->all();
	//include_once __DIR__ . "/../../views/product/all.php";
	include_once __DIR__ . "/../../views/shop/list.php";
	}
	public function update()
	{
		$id =(int)$_GET['id'];
		if(empty($id)) die('Undefined ID');
	    $onesh =(new Shop())->getById($id);
	if(empty($onesh)) die('Shop not found');
	include_once __DIR__ ."/../../views/shop/form.php";
	}
	public function delete()
	{
		$id=(int)$_GET['id'];
		(new Shop())->deletebyid($id);
	
	return $this->read();
	}
	
}


?>