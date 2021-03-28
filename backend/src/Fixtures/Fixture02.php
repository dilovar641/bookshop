<?php
include_once __DIR__ . "/../../../common/src/Service/DBconnector.php";
class Fixture02
{
	private $conn;
	
	private $data = [
	[
		'id' => 'null',
		'title' => 'notorious',
		'groupId' => '2',
		'parentId '=> '1',
		'prior' => '2'
		
		
	],
	[
		'id' => 'null',
		'title' => 'notorious',
		'groupId' => '2',
		'parentId '=> '1',
		'prior' => '2'
		
		
	],
	[
		'id' => 'null',
		'title' => 'notorious',
		'groupId' => '2',
		'parentId '=> '1',
		'prior' => '2'
		
		
	],
	[
		'id' => 'null',
		'title' => 'notorious',
		'groupId' => '2',
		'parentId '=> '1',
		'prior' => '2'
		
		
	],
	[
		'id' => 'null',
		'title' => 'notorious',
		'groupId' => '2',
		'parentId '=> '1',
		'prior' => '2'
		
		
	],
	[
		'id' => 'null',
		'title' => 'notorious',
		'groupId' => '2',
		'parentId '=> '1',
		'prior' => '2'
		
		
	],
	[
		'id' => 'null',
		'title' => 'notorious',
		'groupId' => '2',
		'parentId '=> '1',
		'prior' => '2'
		
		
	],
	[
		'id' => 'null',
		'title' => 'notorious',
		'groupId' => '2',
		'parentId '=> '1',
		'prior' => '2'
		
		
	],
	[
		'id' => 'null',
		'title' => 'notorious',
		'groupId' => '2',
		'parentId '=> '1',
		'prior' => '2'
		
		
	],
	[
		'id' => 'null',
		'title' => 'notorious',
		'groupId' => '2',
		'parentId '=> '1',
		'prior' => '2'
		
		
	],
		
	];
	
	public function __construct(DBconnector $conn)
	{
		$this->conn=$conn->connect();
	}
	public function run()
	{
		foreach($this->data as $categories){
			//copy(__DIR__ ."/../../fixtures_pics/" . $products['picture'], __DIR__ ."/../../../uploads/products/". $products['picture']);
		
		$result=mysqli_query($this->conn,"INSERT INTO categories VALUES(
		" . $categories['id'] . ",
		'" . $categories['title'] . "',
		'" . $categories['groupId'] . "',
		'" . $categories['parentId'] . "'
		'" . $categories['prior'] . "'
		
		)");
		
	    if(!$result){
			print mysqli_error($this->conn) . PHP_EQL;
		}
	}
		
		
	 }
	
}
?>