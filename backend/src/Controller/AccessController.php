<?php
include_once __DIR__ ."/AbstractController.php";
include_once __DIR__ ."/../../../common/src/Model/Role.php";
include_once __DIR__ ."/../../../common/src/Model/Permission.php";
include_once __DIR__ ."/../../../common/src/Model/Access.php";


class AccessController extends AbstractController
{

	
	public function save()
	{
		if(!empty($_POST)){
			//truncate
			if((new Access())->clear()){
				if((new Access())->createall($_POST['access'] ?? [])){
					 header("location:/backend/?model=access&action=update");
	                die();
				}
			}
     }
	
	
	}
	public function create()
	{
	
	}
	public function read()
	{
		
	}
	public function update()
	{
		$roles =(new Role())->all();
		$permissions =(new Permission())->all();
		
		$accesses=[];
		foreach ((new Access())->all() as $item){
		$accesses[$item['role']][$item['permission']] = true;
		}
		// print"<pre>";
	// print_r($accesses);
	// print"</pre>";
	// die();
	include_once __DIR__ ."/../../views/access/form.php";
	}
	public function delete()
	{
	
	return $this->read();
	}
	
}


?>