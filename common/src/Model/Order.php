<?php
include_once __DIR__ . "/../Service/DBconnector.php";
include_once __DIR__ . "/../Model/Product.php";
class Order
{
 
	private $id;
	private $userid;
	private $deliveryid;
	private $paymentid;
	private $total;
	private $status;
	private $created;
	private $updated;
	private $comment;
	private $name;
	private $phone;
	private $email;
	
	 
	 
	 private $conn;
	public function __construct(
	$id = null,
	$userid = null,
	$paymentid = null,
	$deliveryid = null,
	$total = null,
	$comment = null,
	$name = null,
	$phone = null,
	$email = null,
	$status = null,
	$updated = null
	)
	{
		$this->conn = DBconnector::getInstance()->connect();
		$this->id = $id;
		$this->userid = $userid;
		$this->paymentid = $paymentid;
		$this->deliveryid = $deliveryid;
		$this->total = $total;
		$this->status = $status;
		$this->comment = $comment;
		$this->email = $email;
		$this->name = $name;
		$this->phone = $phone;
		if($this->id == null){
			$this->created = date('y-m-d h:i:s',time());
		}
		
		$this->updated=$updated ?? date('y-m-d h:i:s',time());
		
		
	}
	public function setstatus($status)
	{
		$this->status = $status;
	}
	
	public function getstatus($status)
	{
		return $this->status;
	}
	public function getid($id)
	{
		return $this->id;
	}
	
	public function setid($id)
	{
		$this->id=$id;
	}
	
	public function getuserid($userid)
	{
		return $this->userid;
	}
	
	public function setuserid($userid)
	{
		$this->userid=$userid;
	}
	
	public function getdeliveryid($deliveryid)
	{
		return $this->deliveryid;
	}
	
	public function setdeliveryid($deliveryid)
	{
		$this->deliveryid=$deliveryid;
	}
	
	public function getpaymentid($paymentid)
	{
		return $this->paymentid;
	}
	
	public function setpaymentid($paymentid)
	{
		$this->paymentid=$paymentid;
		
	}
	public function gettotal($total)
	{
		return $this->total;
	}
	
	public function settotal($total)
	{
		$this->total=$total;
	}
	public function getcomment($comment)
	{
		return $this->comment;
	}
	
	public function setcomment($comment)
	{
		$this->comment=$comment;
	}
	
	
	
	public function getcreated($created)
	{
		return $this->created;
	}
	
	public function setcreated($created)
	{
		$this->created=$created;
	}
	
	public function getupdated($updated)
	{
		return $this->updated;
	}
	
	public function setupdated($updated)
	{
		$this->updated=$updated;
	}
		public function getname($name)
	{
		return $this->name;
	}
	
	public function setname($name)
	{
		$this->name=$name;
	}
	public function getphone($phone)
	{
		return $this->phone;
	}
	
	public function setphone($phone)
	{
		$this->phone=$phone;
	}
	
	public function getemail($email)
	{
		return $this->email;
	}
	
	public function setemail($email)
	{
		$this->email=$email;
	}
	
	
	 
	 public function save()
	 {
	
		$query = "INSERT INTO orders(
		id,
		user_id,
		status,
		created,
		updated,
		delivery_id,
		payment_id,
		total,
		comment,
		email,
		name,
		phone)
         VALUES (null,'" . $this->userid ."','" . $this->status . "','" . $this->created
		."','" . $this->updated ."','" . $this->deliveryid 
		."','" . $this->paymentid ."','" . $this->total
		."','" . $this->comment ."','" . $this->email ."','" . $this->name ."','" . $this->phone ."')";
		
	
	$result=mysqli_query($this->conn,$query);
	if(!$result){
		throw new Exception(mysqli_error($this->conn));
	}
	
	$result = mysqli_query($this->conn,"SELECT LAST_INSERT_ID() as last_id");
	$result = mysqli_fetch_all($result,MYSQLI_ASSOC);
	return reset ($result)['last_id'] ?? null;
	}
	
	 
	 public function update()
	 {
	
		$query = "UPDATE orders  SET status = '". $this->status . "', updated = '" . $this->updated . "', delivery_id = '" . $this->deliveryid 
		. "',payment_id = '" . $this->paymentid . "', total = '" . $this->total
		. "',email = '" . $this->email ."',name = '" . $this->name ."',phone = '" . $this->phone ."'WHERE id = " . $this->id  . " limit 1 ";
		
	
	$result=mysqli_query($this->conn,$query);
	if(!$result){
		throw new Exception(mysqli_error($this->conn));
	}
	
	
	return true;
	}
	
	public function getfromdb()
	{
	$result = mysqli_query($this->conn,"select * from orders where user_id = " . $this->userid . " limit 1 ");
	$onep = mysqli_fetch_all($result,MYSQLI_ASSOC);
	
	 return  reset ($onep);
	}
	
	public function all()
	{
	$result= mysqli_query($this->conn,"select * from orders");
	return mysqli_fetch_all($result,MYSQLI_ASSOC);
	
	
	}
	
		public function getbyid($id)
	{
	$result = mysqli_query($this->conn,"select * from orders where  id = ". $id . " limit 1 ");
	$onep = mysqli_fetch_all($result,MYSQLI_ASSOC);
	
	 return  reset ($onep);
	}
	
	public function getproductsandquantitybyorderid($orderid)
	{
		$products = [];
		$result = mysqli_query($this->conn,"select 
		order_item.quantity,
    products.*
    from
    order_item
    left join products on order_item.product_id = product_id
	where  order_id = ". $orderid );
	
	foreach(mysqli_fetch_all($result,MYSQLI_ASSOC) as $item){
		$products[] = [
		'quantity'=> $item['quantity'],
		'product'=> new Product($item['id'],$item['title'],$item['picture'],
		$item['preview'],$item['content'],$item['price'],$item['status'],$item['created'],$item['updated'])
		];
		
	}
	return $products;
	}
}
?>