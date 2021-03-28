<?php
class OrderService
{
	const STATUS_NEW = 0;
	const STATUS_IN_PROCESS = 1;
	const STATUS_COMPLETED = 2;
	const STATUS_CANCELED = 3;
	
	public  static function getstatuses()
	{
		return[
		self::STATUS_NEW => 'New',
	self::STATUS_IN_PROCESS =>'In process',
	self::STATUS_COMPLETED => 'Completed',
	self::STATUS_CANCELED =>'Canceled',
		];
	}	
	public function calctotal(array $quantituandproducts)
	{
		$total = 0;
		foreach($quantituandproducts as $item){
		$product = $item['product'];
		$total += $item['quantity'] * $product->price;
	}
	return $total;
}
	
}
?>