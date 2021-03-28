<?php
include_once __DIR__ . "/../Service/DBconnector.php";
class Basketitem
{
 
	
	 public $basketid;
	  public $product;
	   public $quantity;
	 
	 private $conn;
	public function __construct(
	$basketid = null,
	$productid = null,
	$quantity = null
	)
	{
		$this->conn = DBconnector::getInstance()->connect();
		$this->basketid=$basketid;
		$this->productid=$productid;
		$this->quantity=$quantity;
		
		
		
	}
	 
	 public function save()
	 {
	
		$query = "INSERT INTO basket_item VALUES (null,'" . $this->basketid ."','" . $this->productid ."','" . $this->quantity ."')";
	
		$result=mysqli_query($this->conn,$query);
	if(!$result){
		throw new Exception(mysqli_error($this->conn));
	}
	
	}
	 public function update()
	 {
           
		   if(empty($this->basketid) || empty($this->productid) || empty($this->quantity)){
			   throw new Exception("empty basket_item field");
		   }
		$query = "UPDATE basket_item SET quantity = " . $this->quantity
		. " where basket_id = " . $this->basketid
		. " and product_id = " . $this->productid
		. " limit 1 ";
	
	
	$result=mysqli_query($this->conn,$query);
	if(!$result){
		throw new Exception(mysqli_error($this->conn));
	}
	
	}
	public function getbyBasketid($basketid)
	{
	$result= mysqli_query($this->conn,"select * from basket_item where basket_id=$basketid ");
	
	$items= mysqli_fetch_all($result,MYSQLI_ASSOC);
	
	 return   $items;
	}
	public function deleteproductbybasketid($productid,$basketid)
	{
		
	mysqli_query($this->conn,"delete from basket_item where product_id=$productid and basket_id=$basketid limit 1");
	}
	public function clearbybasketid($basketid)
	{
		
	mysqli_query($this->conn,"delete from basket_item where basket_id=$basketid ");
	}
}
?>