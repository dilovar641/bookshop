<?php

include_once __DIR__ ."/../../../common/src/Service/DBconnector.php";

class Migrationaddcitytoshop{
	
	private $conn;
	
	public function __construct(DBconnector $connector)
	{
		$this->conn=$connector->connect();
	}
	public function commit()
	{
		$result=mysqli_query($this->conn,"ALTER TABLE shops ADD city  VARCHAR(255) NOT NULL DEFAULT 0 ");
		if(!$result){
			print mysqli_error($this->conn) . PHP_EOL;
		}
		// $result=mysqli_query($this->conn,"UPDATE  shops SET city = 'NEW YORK' WHERE  address='1212'");
		// if(!$result){
			// print mysqli_error($this->conn) . PHP_EOL;
		// }
		// $result=mysqli_query($this->conn,"UPDATE  shops SET city = 'LONDON' WHERE  address=");
		// if(!$result){
			// print mysqli_error($this->conn) . PHP_EOL;
		// }
		
	}
	public function rollback()
	{
		$result=mysqli_query($this->conn,"ALTER TABLE shops DROP  COLUMN city ");
		if(!$result){
			print mysqli_error($this->conn) . PHP_EOL;
		}
	}
}

?>