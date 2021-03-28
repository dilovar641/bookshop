<?php
include_once __DIR__ . "/../Service/DBconnector.php";

class Access

{
	 private $conn;
	public function __construct($userid = null)
	{
		$this->conn = DBconnector::getInstance()->connect();
			
	}
	
	public function createall(array $data = [])
	{
		if(empty($data)) {
			throw new Exception('EMPTY ACCESS DATA');
		}
		$accesses = [];
		foreach($data as $role => $perms){
			foreach($perms as $perm =>$value){
			if($value === 'on')	$accesses[] = sprintf("('%s','%s')",$role,$perm);
			}
		}
		
		if(empty($accesses)){
			throw new Exception('EMPTY DATA FOR ACCESS INSERT');
		}
		
		
		 $query="INSERT INTO rbac_access VALUES" . implode(',',$accesses);
		
		$result= mysqli_query($this->conn,$query);
	if(!$result){
		throw new Exception(mysqli_error($this->conn));
	}
	return  true;
	}
	
	public function clear()
	{
	$result= mysqli_query($this->conn,"truncate table  rbac_access");
	if(!$result){
		throw new Exception(mysqli_error($this->conn));
	}
	return  true;
	
	}
	
	public function all()
	{
	$result= mysqli_query($this->conn,"select * from rbac_access");
	return  mysqli_fetch_all($result,MYSQLI_ASSOC);
	
	}
	 
	
}
?>