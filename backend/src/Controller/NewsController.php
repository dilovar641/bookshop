<?php
include_once __DIR__ ."/AbstractController.php";
include_once __DIR__ ."/../../../common/src/Model/News.php";


class NewsController extends AbstractController
{

	
	public function save()
	{
		
    $news = new News(
	intval($_POST['id']),
	htmlspecialchars ($_POST['title']),
	htmlspecialchars  ($_POST['group_id']),
	htmlspecialchars ($_POST['parent_id'])
	
	);
	$news->save();
	
	
	
	return $this->read();
	}
	public function create()
	{
	
	
	include_once __DIR__ ."/../../views/news/form.php";
	}
	public function read()
	{
		
	$all=(new News())->all();
	//include_once __DIR__ . "/../../views/product/all.php";
	include_once __DIR__ . "/../../views/news/list.php";
	}
	public function update()
	{
		$id =(int)$_GET['id'];
		if(empty($id)) die('Undefined ID');
	    $onen =(new News())->getById($id);
	if(empty($onen)) die('News not found');
	include_once __DIR__ ."/../../views/news/form.php";
	}
	public function delete()
	{
		$id=(int)$_GET['id'];
		(new News())->deletebyid($id);
	
	return $this->read();
	}
	
}


?>