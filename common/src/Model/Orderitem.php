<?php
include_once __DIR__ . "/../Service/DBconnector.php";
class Orderitem
{
 
	
	 public $orderid;
	  public $product;
	   public $quantity;
	 
	 private $conn;
	public function __construct(
	$orderid = null,
	$productid = null,
	$quantity = null
	)
	{
		$this->conn = DBconnector::getInstance()->connect();
		$this->orderid=$orderid;
		$this->productid=$productid;
		$this->quantity=$quantity;
		
		
		
	}
	 
	 public function save()
	 {
	
		$query = "INSERT INTO order_item VALUES (null,'" . $this->orderid ."','"
		. $this->productid ."','" . $this->quantity ."')";
	
		$result=mysqli_query($this->conn,$query);
	if(!$result){
		throw new Exception(mysqli_error($this->conn));
	}
	
	}
	 public function update()
	 {
           
		   if(empty($this->basketid) || empty($this->productid) || empty($this->quantity)){
			   throw new Exception("empty order_item field");
		   }
		$query = "UPDATE order_item SET quantity = " . $this->quantity
		. " where order_id = " . $this->orderid
		. " and product_id = " . $this->productid
		. " limit 1 ";
	
	
	$result=mysqli_query($this->conn,$query);
	if(!$result){
		throw new Exception(mysqli_error($this->conn));
	}
	
	}
	public function getbyorderid($orderid)
	{
	$result= mysqli_query($this->conn,"select * from order_item where order_id=$orderid ");
	
	$items= mysqli_fetch_all($result,MYSQLI_ASSOC);
	
	 return   $items;
	}
	public function deleteproductbyorderid($productid,$orderid)
	{
		
	mysqli_query($this->conn,"delete from order_item where product_id=$productid and order_id=$orderid limit 1");
	}
	public function clearbyorderid($basketid)
	{
		
	mysqli_query($this->conn,"delete from order_item where order_id=$orderid ");
	}
}
?>