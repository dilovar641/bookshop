<?php
include_once __DIR__ . "/../Service/DBconnector.php";
class News
{
 
	 public $id;
	 public $title;
	 public $content;
	 public $created;
	 
	 
	 private $conn;
	public function __construct(
	$id=null,
	$title=null,
	$content=null,
	$created=null
	)
	{
		$this->conn = DBconnector::getInstance()->connect();
		
		$this->id=$id;
		$this->title=$title;
		$this->content=$content;
		$this->created=$created;
		
	}
	 
	 public function save()
	 {
	if($this->id>0){
		$query = "UPDATE  news set 
		title='" . $this->title ."',
		content='" .$this->content ."',
		created='" . $this->created ."'
		where id=" . $this->id  . " limit 1 ";
	}else{
		$query = "INSERT INTO news VALUES (null,
		'" . $this->title ."',
		'" . $this->content ."',
		'" . $this->created ."'
		)";
	}
	$result=mysqli_query($this->conn,$query);
	// var_dump=($result);
	// $errors=mysqli_error_list($this->conn);
	}
	public function all()
	{
		$result = mysqli_query($this->conn,"select * from news order by id desc");
	   return mysqli_fetch_all($result,MYSQLI_ASSOC);
	}
	public function getById($id)
	{
	$result= mysqli_query($this->conn,"select * from news where id=$id limit 1");
	$onen= mysqli_fetch_all($result,MYSQLI_ASSOC);
	
	 return  reset ($onen);
	}
	public function deletebyid($id)
	{
		
	mysqli_query($this->conn,"delete from news where id=$id limit 1");
	}
}
?>