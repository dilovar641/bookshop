<?php
abstract class AbstractTest
{
	protected $conn;
	
	public function __construct()
	{
		$this->conn = (new DBconnector(
		'localhost',
		'shop_test_user',
		'shop_test_password',
		'shop_test'))->connect();
	}
	public function copytablebyname($name)
	{
		$query = "show create table shop. " . $name;
		$result = mysqli_query($this->conn,$query);
		
		
		$result = mysqli_fetch_all($result,MYSQLI_ASSOC);
		print_r($result[0]['create table']);
		
	
	}
} 
?>