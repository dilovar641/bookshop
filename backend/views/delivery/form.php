<?php
include_once __DIR__ ."/../header.php";
?>

<div class="content-wrapper">
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> Delivery</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Create delivery</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
<section class="content">
<div class="card card-info">
              
             
              <!-- form start -->

			   <form  class="form-horizontal" action="http://shop/backend/index.php?model=order&action=update" method="post" enctype="multipart/form-data">
			   <div class="card-body">
<input type="hidden" value="<?=$onen['id']?? ''?>" name="id" >
<div class="form-group row">
                    <label  class="col-sm-2 col-form-label">title</label>
                    <div class="col-sm-10">
					  <input type="text"  value="<?=$onen['title']?? ''?>"name="title" readonly class="form-control">
                    </div>
                  </div>
<div class="form-group row">
<label class="col-sm-2 col-form-label">code</label>
<div class="col-sm-10">
	<input type="text" value="<?=$onen['code']?? ''?>"  readonly  name="code" class="form-control"  >
</div>
</div>
<div class="form-group row">
<label class="col-sm-2 col-form-label">priority</label>
<div class="col-sm-10">
	<input type="text" value="<?=$onen['priority']?? ''?>"  readonly  name="priority" class="form-control"  >
</div>
</div>
</form>
 </div>
 </section>
</div>
<?php
include_once __DIR__ ."/../footer.php";
?>