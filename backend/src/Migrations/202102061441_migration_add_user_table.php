<?php
include_once __DIR__ ."/../../../common/src/Service/DBconnector.php";
include_once __DIR__ ."/../../../common/src/Service/UserService.php";

class Migrationaddusertable{
	
	
	
	private $conn;
	
	
	public function __construct(DBconnector $connector)
	{
		$this->conn=$connector->connect();
	}
	public function commit()
	{
		
			$result=mysqli_query($this->conn,"CREATE TABLE `user` (
			`id` int not null auto_increment,
			`name` varchar(190) not null,
			`phone` varchar(190) not null UNIQUE,
			`email` varchar(230) not null UNIQUE,
			`password` varchar(128) not null,
			`roles` varchar(128) not null,
		     PRIMARY KEY(id)
			 )engine = innoDB default charset utf8");
	    if(!$result){
			print mysqli_error($this->conn) . PHP_EQL;
		}
		
		
			$result=mysqli_query($this->conn,"
			INSERT INTO `user` (`name`, `phone`, `email`,`password`,`roles` )
			VALUES ('superadmin','1111','sss@mail.ru','" . UserService::encodepassword('superadmin') . "','[\"ROLE_SUPER_ADMIN\"]')");
	    if(!$result){
			print mysqli_error($this->conn) . PHP_EQL;
		}
		
		
	}
	public function rollback()
	{
		$result=mysqli_query($this->conn,"DROP TABLE `user` ");
		if(!$result){
			print mysqli_error($this->conn) . PHP_EOL;
		}
	}
}
?>