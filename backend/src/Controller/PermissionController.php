<?php
include_once __DIR__ ."/AbstractController.php";
include_once __DIR__ ."/../../../common/src/Model/Permission.php";


class PermissionController extends AbstractController
{

	
	public function save()
	{
		
    $news = new Permission(htmlspecialchars ($_POST['permission']));

	$news->save();
	
	
	
	return $this->read();
	}
	public function create()
	{
	
	
	include_once __DIR__ ."/../../views/permission/form.php";
	}
	public function read()
	{
		
	$all=(new Permission())->all();
	//include_once __DIR__ . "/../../views/product/all.php";
	include_once __DIR__ . "/../../views/permission/list.php";
	}
	
	public function update()
	{
		
	}

	public function delete()
	{
		$id=htmlspecialchars($_GET['permission']);
		(new Permission())->deletebyname($id);
	
	return $this->read();
	}
	
}


?>