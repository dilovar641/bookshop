<?php
include_once __DIR__ ."/../header.php";
?>
<div>
<a class="btn btn-warning" href="http://shop/backend/index.php?model=category&action=create">Добавить товар</a>
</div>
<table class="table">
<thead>
<th>ID</th>
<th>Title</th>
<th>Group_id</th>
<th>Parent_id</th>




</thead>
<tbody>
<?php foreach ($all as $categories):?>
<tr>
<td><?=$categories['id']?></td>
<td><?=$categories['title']?></td>
<td><?=$categories['group_id']?></td>
<td><?=$categories['parent_id']?></td>


 <td style="width:200px">
<a href="http://shop/backend/index.php?model=category&action=delete&id=<?=$categories['id']?>"class="btn btn-danger">Delete</a>
<a href="http://shop/backend/index.php?model=category&action=update&id=<?=$categories['id']?>"class="btn btn-warning">Update</a>
</td>
</tr>
<?php endforeach;?>
</tbody>
</table>
<?php
include_once __DIR__ ."/../footer.php";
?>