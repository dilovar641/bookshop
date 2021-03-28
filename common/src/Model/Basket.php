<?php
include_once __DIR__ . "/../Service/DBconnector.php";
class Basket
{
 
	 public $id;
	 public $userid;
	 public $items=[];
	 
	 private $conn;
	public function __construct($userid = null)
	{
		$this->conn = DBconnector::getInstance()->connect();
		
		
		$this->userid=$userid;
		
		
	}
	 
	 public function save()
	 {
	
		$query = "INSERT INTO basket VALUES (null,
		'" . $this->userid ."')";
		
	
	$result=mysqli_query($this->conn,$query);
	if(!$result){
		throw new Exception(mysqli_error($this->conn));
	}
	
	}
	
	public function getfromdb()
	{
	$result= mysqli_query($this->conn,"select * from basket where user_id=" .$this->userid ." limit 1");
	$onep= mysqli_fetch_all($result,MYSQLI_ASSOC);
	
	 return  reset ($onep);
	}
	public function deleteuserbyid($userid)
	{
		
	mysqli_query($this->conn,"delete from basket where user_id=$user_id limit 1");
	}
	
	
}
?>