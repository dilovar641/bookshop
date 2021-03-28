<?php
include_once __DIR__ ."/AbstractController.php";
include_once __DIR__ ."/../../../common/src/Model/Category.php";


class CategoryController extends AbstractController
{

	
	public function save()
	{
		
    $category = new Category(
	intval($_POST['id']),
	htmlspecialchars ($_POST['title']),
	htmlspecialchars  ($_POST['group_id']),
	htmlspecialchars ($_POST['parent_id']),
	(int) $_POST['created']
	
	);
	$category->save();
	
	
	
	return $this->read();
	}
	public function create()
	{
	
	
	include_once __DIR__ ."/../../views/category/form.php";
	}
	public function read()
	{
		
	$all=(new Category())->all();
	//include_once __DIR__ . "/../../views/product/all.php";
	include_once __DIR__ . "/../../views/category/list.php";
	}
	public function update()
	{
		$id =(int)$_GET['id'];
		if(empty($id)) die('Undefined ID');
	    $onec =(new Category())->getById($id);
	if(empty($onec)) die('Category not found');
	include_once __DIR__ ."/../../views/category/form.php";
	}
	public function delete()
	{
		$id=(int)$_GET['id'];
		(new Category())->deletebyid($id);
	
	return $this->read();
	}
	
}


?>