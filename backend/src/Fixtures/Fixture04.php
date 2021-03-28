<?php
include_once __DIR__ . "/../../../common/src/Service/DBconnector.php";
class Fixture04
{
	private $conn;
	
	private $data = [
	[
		'id' => 'null',
		'title' => 'notorious',
		'address' => '2',
		'city' => 'new york'
		
    ],
	[
		'id' => 'null',
		'title' => 'notorious',
		'address' => '2',
		'city' => 'new york'
		
    ],
	[
		'id' => 'null',
		'title' => 'notorious',
		'address' => '2',
		'city' => 'new york'
		
    ],
	[
		'id' => 'null',
		'title' => 'notorious',
		'address' => '2',
		'city' => 'new york'
		
    ],
	[
		'id' => 'null',
		'title' => 'notorious',
		'address' => '2',
		'city' => 'new york'
		
    ],

	];
	
	public function __construct(DBconnector $conn)
	{
		$this->conn=$conn->connect();
	}
	public function run()
	{
		foreach($this->data as $shops){
			//copy(__DIR__ ."/../../fixtures_pics/" . $products['picture'], __DIR__ ."/../../../uploads/products/". $products['picture']);
		
		$result=mysqli_query($this->conn,"INSERT INTO shops VALUES(
		" . $shops['id'] . ",
	   '" . $shops['title'] . "',
	   '" . $shops['address'] . "',
	   '" . $shops['city'] . "'
		
		
		)");
		
	    if(!$result){
			print mysqli_error($this->conn) . PHP_EQL;
		}
	}
		
		
	 }
	
}
?>