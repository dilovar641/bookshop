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
            <h1>Orders</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Orders</li>
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
<th>User ID</th>
<th>Payment</th>
<th>Delivery</th>                                                            
<th>Total</th>
<th>Comment</th>
<th>Name</th>
<th>Phone</th>
<th>Email</th>                                                 
<th>Status</th>
<th>Created</th>
<th>Updated</th>

</thead>
<tbody>
<?php foreach ($all as $news):?>
<tr>
<td><?=$news['id']?></td>
<td><?=$news['user_id']?></td>
<td><?=$news['payment_id']?></td>
<td><?=$news['delivery_id']?></td>
<td><?=$news['total']?></td>
<td><?=$news['comment']?></td>
<td><?=$news['name']?></td>
<td><?=$news['phone']?></td>
<td><?=$news['email']?></td>
<td><?=$news['status']?></td>
<td><?=$news['created']?></td>
<td><?=$news['updated']?></td>
<td style="width:200px">
                           <!--a class="btn btn-primary btn-sm" href="#">
                              <i class="fas fa-folder">
                              </i>
                              View
                          </a-->
                          <a class="btn btn-info btn-sm" href="http://shop/backend/index.php?model=order&action=update&id=<?=$news['id']?>">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Edit
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
  