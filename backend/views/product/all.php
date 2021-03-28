<?php
include_once __DIR__ ."/../header.php";
?>
<div>
<a class="btn btn-warning" href="http://shop/backend/index.php?model=product&action=create">Добавить товар</a>
</div>
<table class="table">
<thead>
<th>ID</th>
<th>Title</th>
<th>Picture</th>
<th>Preview</th>
<th>Content</th>
<th>Price</th>
<th>Status</th>
<th>Created</th>
<th>Updated</th>
<th>Actions</th>

</thead>
<tbody>
<?php foreach ($all as $products):?>
<tr>
<td><?=$products['id']?></td>
<td><?=$products['title']?></td>
<td><img src="/shop/uploads/products/<?$products['picture']?>"></td>
<td><?=$products['preview']?></td>
<td><?=$products['content']?></td>
<td><?=$products['price']?></td>
<td><?=$products['status']?></td>
<td><?=$products['created']?></td>
<td><?=$products['updated']?></td>

 <td style="width:200px">
<a href="http://shop/backend/index.php?model=product&action=delete&id=<?=$products['id']?>"class="btn btn-danger">Delete</a>
<a href="http://shop/backend/index.php?model=product&action=update&id=<?=$products['id']?>"class="btn btn-warning">Update</a>
</td>
</tr>
<?php endforeach;?>
</tbody>
</table>
<?php
include_once __DIR__ ."/../footer.php";
?>