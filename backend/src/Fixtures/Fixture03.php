<?php
include_once __DIR__ . "/../../../common/src/Service/DBconnector.php";
class Fixture03
{
	private $conn;
	
	private $data = [
	[
		'id' => 'null',
		'title' => 'notorious',
		'content' => '2',
		'created '=> '1'
		
    ],
	[
		'id' => 'null',
		'title' => 'notorious',
		'content' => '2',
		'created '=> '1'
		
    ],
	[
		'id' => 'null',
		'title' => 'notorious',
		'content' => '2',
		'created '=> '1'
		
    ],
	[
		'id' => 'null',
		'title' => 'notorious',
		'content' => '2',
		'created '=> '1'
		
    ],
	[
		'id' => 'null',
		'title' => 'notorious',
		'content' => '2',
		'created '=> '1'
		
    ],
	[
		'id' => 'null',
		'title' => 'notorious',
		'content' => '2',
		'created '=> '1'
		
    ],
	[
		'id' => 'null',
		'title' => 'notorious',
		'content' => '2',
		'created '=> '1'
		
    ],
	[
		'id' => 'null',
		'title' => 'notorious',
		'content' => '2',
		'created '=> '1'
		
    ],
	[
		'id' => 'null',
		'title' => 'notorious',
		'content' => '2',
		'created '=> '1'
		
    ],
	[
		'id' => 'null',
		'title' => 'notorious',
		'content' => '2',
		'created '=> '1'
		
    ],
	

	];
	
	public function __construct(DBconnector $conn)
	{
		$this->conn=$conn->connect();
	}
	public function run()
	{
		foreach($this->data as $news){
			//copy(__DIR__ ."/../../fixtures_pics/" . $products['picture'], __DIR__ ."/../../../uploads/products/". $products['picture']);
		
		$result=mysqli_query($this->conn,"INSERT INTO news VALUES(
		" . $news['id'] . ",
		'" . $news['title'] . "',
		'" . $news['content'] . "',
		'" . $news['created'] . "'
		
		
		)");
		
	    if(!$result){
			print mysqli_error($this->conn) . PHP_EQL;
		}
	}
		
		
	 }
	
}
?>