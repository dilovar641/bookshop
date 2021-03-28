<?php
include_once __DIR__ ."/../header.php";
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Products</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Products</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-body p-0">
		<table class="table table-striped projects">
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
                           <!--a class="btn btn-primary btn-sm" href="#">
                              <i class="fas fa-folder">
                              </i>
                              View
                          </a-->
                          <a class="btn btn-info btn-sm" href="http://shop/backend/index.php?model=product&action=update&id=<?=$products['id']?>">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Edit
                          </a>
                          <a class="btn btn-danger btn-sm" href="http://shop/backend/index.php?model=product&action=delete&id=<?=$products['id']?>">
                              <i class="fas fa-trash">
                              </i>
                              Delete
                          </a>
						  
</td>
</tr>
<?php endforeach;?>
</tbody>

         
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php
include_once __DIR__ ."/../footer.php";
?>
  