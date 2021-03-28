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
            <h1>Categories</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Categories</li>
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
<th>Group_id</th>
<th>Parent_id</th>
<th>Created</th>



</thead>
<tbody>
<?php foreach ($all as $categories):?>
<tr>
<td><?=$categories['id']?></td>
<td><?=$categories['title']?></td>
<td><?=$categories['group_id']?></td>
<td><?=$categories['parent_id']?></td>



 <td style="width:200px">
                           <!--a class="btn btn-primary btn-sm" href="#">
                              <i class="fas fa-folder">
                              </i>
                              View
                          </a-->
                          <a class="btn btn-info btn-sm" href="http://shop/backend/index.php?model=category&action=update&id=<?=$categories['id']?>">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Edit
                          </a>
                          <a class="btn btn-danger btn-sm" href="http://shop/backend/index.php?model=category&action=delete&id=<?=$categories['id']?>">
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
  