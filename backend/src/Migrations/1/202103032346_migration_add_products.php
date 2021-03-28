<?php
include_once __DIR__ ."/../../../common/src/Service/DBconnector.php";

class Migrationaddproducts{
	
	
	
	private $conn;
	
	private $data = [
	[
		'id' => 'null',
		'title' => 'Billie Eilish2323232',
		'picture' => '01.jpg',
		'preview '=> 'sdsdsdsd',
		'content' => 'fgfghfgfgvfdv',
		'price' => '6',
		'status' => '8',
		'created' => '2021-02-16 09:34:21',
		'updated' => '2021-02-16 09:47:34'
	],
	[
		'id' => 'null',
		'title' => 'Billie Eilish Gregory',
		'picture' => '02.jpg',
		'preview' => 'sdsdsdsd',
		'content' => 'fgfghfgfgvfdv',
		'price' => '6',
		'status' => '7',
		'created ' => '2021-02-16 09:34:21',
		'updated' => '2021-02-16 09:47:34'
	],
	[
		'id' => 'null',
		'title' => 'daddy',
		'picture' => '03.jpg',
		'preview' => 'sdsdsdsd',
		'content' => 'fgfghfgfgvfdv',
		'price' => '1212',
		'status' => '2',
		'created' => '2021-02-16 09:34:21',
		'updated' => '2021-02-16 09:47:34'
		],
	];
	
	
	public function __construct(DBconnector $connector)
	{
		$this->conn=$connector->connect();
	}
	public function commit()
	{
		foreach ($this->data as $products){
			$result=mysqli_query($this->conn,"INSERT INTO products VALUES(
		" . $products['id'] . ",
		'" . $products['title'] . "',
		'" . $products['picture'] . "',
		'" . $products['preview'] . "',
		'" . $products['content'] . "',
		'" . $products['price'] . "',
		'" . $products['status'] . "',
		'" . $products['created'] . "',
		'" . $products['updated'] . "'
		)");
		
	    if(!$result){
			print mysqli_error($this->conn) . PHP_EQL;
		}
		}
		
	}
	public function rollback()
	{
		$result=mysqli_query($this->conn,"TRUNCATE TABLE products ");
		if(!$result){
			print mysqli_error($this->conn) . PHP_EOL;
		}
	}
}
?>