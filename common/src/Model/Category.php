<?php
include_once __DIR__ . "/../Service/DBconnector.php";
class Category
{
 
	 public $id;
	 public $title;
	 public $groupId;
	 public $parentId;
	 public $prior;
	 
	 
	 private $conn;
	public function __construct(
	$id=null,
	$title=null,
	$groupId=null,
	$parentId=null,
	$prior=null
	)
	{
		$this->conn = DBconnector::getInstance()->connect();
		
		$this->id=$id;
		$this->title=$title;
		$this->group_id=$groupId;
		$this->parent_id=$parentId;
		$this->prior=$prior;
		
	}
	 
	 public function save()
	 {
	if($this->id>0){
		$query = "UPDATE  categories set 
		title='" . $this->title ."',
		group_id='" .$this->groupId ."',
		parent_id='" . $this->parentId ."',
		prior='" . $this->prior ."'
		where id=" . $this->id  . " limit 1 ";
	}else{
		$query = "INSERT INTO categories VALUES (null,
		'" . $this->title ."',
		'" . $this->groupId ."',
		'" . $this->parentId ."',
		'" . $this->prior ."'
		)";
	}
	$result=mysqli_query($this->conn,$query);
	// var_dump=($result);
	// $errors=mysqli_error_list($this->conn);
	}
	public function all()
	{
		$result = mysqli_query($this->conn,"select * from categories order by id desc");
	   return mysqli_fetch_all($result,MYSQLI_ASSOC);
	}
	public function getById($id)
	{
	$result= mysqli_query($this->conn,"select * from categories where id=$id limit 1");
	$onec= mysqli_fetch_all($result,MYSQLI_ASSOC);
	
	 return  reset ($onec);
	}
	public function deletebyid($id)
	{
		
	mysqli_query($this->conn,"delete from categories where id=$id limit 1");
	}
}
?>