<?php
include_once __DIR__ ."/../site/header.php";
?>

<div class="width1024">
<?php  if(empty($items) || !is_array($items)) :?>
<div>
<div><br><br><br></div>
<p>Корзина пуста</p>
<div><br><br><br></div>
</div>
<?php   else :?>
<div id="basket-container" class="body">
<table class="table">
<thead>
<tr>
<th class="id">#</th>
<th class="picture">Picture</th>
<th>Title</th>
<th class="qty">Quantity</th>
<th class="price">Price</th>
<th class="sum">Sum</th>
<th class="actions"></th>
</tr>
</thead>
<tbody>
<?php foreach($items as $key=> $item):?>
<tr>
<td><?=++$key?></td>
<td class="picture"><a href="/frontend/?model=product&action=view&id=<?=$item['product_id']?>"><img src="http://shop/uploads/products/<?=$item['product']['picture']?>"></a></td>
<td><a href="/frontend/?model=product&action=view&id=<?=$item['product_id']?>"><?=$item['product']['title']?></a></td>
<form action="/frontend/?model=basket&action=change" method="post">
<input type="hidden" name="product_id" value="<?=$item['product']['id']?>">
<td><input type="text" name="qty" value="<?=$item['quantity']?>"></td>
<input type="submit" value="Change">
</form>
<td><?=$item['product']['price']?></td>
<td><?=$item['product']['sum']?></td>


<td>
<form action="/frontend/?model=basket&action=delete" method="post">
<input type="hidden" name="product_id" value="<?=$item['product']['id']?>">
<button>Delete</button>
</form></td>
</tr>
<?php endforeach;?>
<tr><td colspan="6" class="total">Total:</td><td><?=$total?></tr></tr>
</tbody>
</table>
<a href="/frontend/?model=order&action=index" id="btn-create-order">Create Order</a>
</div>
<?php endif ?>
</div>

<?php
include_once __DIR__ ."/../site/footer.php";
?>