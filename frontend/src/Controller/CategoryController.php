<?php

include_once __DIR__ ."/../../../common/src/Model/Category.php";
include_once __DIR__ ."/../../../common/src/Service/ExceptionService.php";


class CategoryController
{

	public function all()
	{
		$all = ( new Category())->all();
	
	include_once __DIR__  . "/../../views/product/list.php";
	}
	public function view()
	{
		try {
			if(!isset($_GET['id'])){
				throw new Exception ("ID is not exists" , 400);
			}
			$id =(int)$_GET['id'];
			
		if(empty($id)) {
			throw new Exception("id is empty",400);
		}
	    $onec = ( new Product())->getById($id);
	if(empty($onec)) {
		throw new Exception("Product not found",404);
	}
	include_once __DIR__ ."/../../views/product/view.php";
	
	}catch  (Exception $e){
		
		// print $e->getmessage();
		ExceptionService::error($e,'frontend');
}

}

}
	



?>