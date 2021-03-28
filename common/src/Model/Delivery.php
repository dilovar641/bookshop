<?php
include_once __DIR__ . "/../Service/DBconnector.php";
class Delivery
{
 
	private $id;
	private $title;
	private $code;
	private $priority;
	
	
	 
	 
	 private $conn;
	public function __construct(
	$id = null,
	$title = null,
	$code = null,
	$priority = null
	
	)
	{
		$this->conn = DBconnector::getInstance()->connect();
		$this->id = $id;
		$this->title = $title;
		$this->code = $code;
		$this->priority = $priority;
		
   }
	public function setid($status)
	{
		$this->id = $id;
	}
	
	public function getid($id)
	{
		return $this->id;
	}
	public function gettitle($title)
	{
		return $this->title;
	}
	
	public function settitle($title)
	{
		$this->title=$title;
	}
	
	public function getcode($code)
	{
		return $this->code;
	}
	
	public function setcode($code)
	{
		$this->code=$code;
	}
	
	public function getpriority($priority)
	{
		return $this->priority;
	}
	
	public function setpriority($priority)
	{
		$this->priority=$priority;
	}
	
	
	
	 
	 public function save()
	 {
	
		$query = "INSERT INTO delivery(
		id,
		title,
		code,
		priority,
		)
         VALUES (null,'" . $this->title ."','" . $this->code . "','" . $this->priority
		 . "')";
		
	
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
	
		$query = "UPDATE delivery  SET title = '". $this->title . "', code = '" . $this->code . "', priority = '" . $this->priority
		 ."'WHERE id = " . $this->id  . " limit 1 ";
		
	
	$result=mysqli_query($this->conn,$query);
	if(!$result){
		throw new Exception(mysqli_error($this->conn));
	}
	
	
	return true;
	}
	
	// public function getfromdb()
	// {
	// $result = mysqli_query($this->conn,"select * from delivery where id = " . $this->id . " limit 1 ");
	// $onep = mysqli_fetch_all($result,MYSQLI_ASSOC);
	
	 // return  reset ($onep);
	// }
	
	public function all()
	{
	$result= mysqli_query($this->conn,"select * from delivery");
	return mysqli_fetch_all($result,MYSQLI_ASSOC);
	
	
	}
	
		public function getbyid($id)
	{
	$result = mysqli_query($this->conn,"select * from delivery where  id = ". $id . " limit 1 ");
	$onep = mysqli_fetch_all($result,MYSQLI_ASSOC);
	
	 return  reset ($onep);
	}
	
}
?>