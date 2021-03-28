<?php
class ProductService
{
	public function getbasketitems($items)
	{
         $total=0;
		foreach($items as $key=>$item){
			$items[$key]['product']=(new Product())->getbyid($item['product_id']);
			$items[$key]['product']['sum']=$items[$key]['product']['price'] * $items[$key]['quantity'];
			$total+=$items[$key]['product']['sum'];
		}
		return [
		'items'=>$items,
		'total'=>$total
		];
	}
}
?>