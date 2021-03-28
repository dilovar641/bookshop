<?php
include_once __DIR__ ."/../header.php";
?>
<div>
<a class="btn btn-warning" href="http://shop/backend/index.php?model=news&action=create">Добавить товар</a>
</div>
<table class="table">
<thead>
<th>ID</th>
<th>Title</th>
<th>Content</th>
<th>Created</th>



</thead>
<tbody>
<?php foreach ($all as $news):?>
<tr>
<td><?=$news['id']?></td>
<td><?=$news['title']?></td>
<td><?=$news['Content']?></td>
<td><?=$news['Created']?></td>



 <td style="width:200px">
<a href="http://shop/backend/index.php?model=news&action=delete&id=<?=$news['id']?>"class="btn btn-danger">Delete</a>
<a href="http://shop/backend/index.php?model=news&action=update&id=<?=$news['id']?>"class="btn btn-warning">Update</a>
</td>
</tr>
<?php endforeach;?>
</tbody>
</table>
<?php
include_once __DIR__ ."/../footer.php";
?>