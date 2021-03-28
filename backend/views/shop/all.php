<?php
include_once __DIR__ ."/../header.php";
?>
<div>
<a class="btn btn-warning" href="http://shop/backend/index.php?model=shop&action=create">Добавить товар</a>
</div>
<table class="table">
<thead>
<th>ID</th>
<th>Title</th>
<th>Address</th>



</thead>
<tbody>
<?php foreach ($all as $shops):?>
<tr>
<td><?=$shops['id']?></td>
<td><?=$shops['title']?></td>
<td><?=$shops['address']?></td>



 <td style="width:200px">
<a href="http://shop/backend/index.php?model=shop&action=delete&id=<?=$shops['id']?>"class="btn btn-danger">Delete</a>
<a href="http://shop/backend/index.php?model=shop&action=update&id=<?=$shops['id']?>"class="btn btn-warning">Update</a>
</td>
</tr>
<?php endforeach;?>
</tbody>
</table>
<?php
include_once __DIR__ ."/../footer.php";
?>