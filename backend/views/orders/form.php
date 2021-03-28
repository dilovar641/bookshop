<?php
include_once __DIR__ ."/../header.php";
?>

<div class="content-wrapper">
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> Create Order</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Create Order</li>
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
                    <label  class="col-sm-2 col-form-label">User id</label>
                    <div class="col-sm-10">
					  <input type="text"  value="<?=$onen['user_id']?? ''?>"name="user_id" readonly class="form-control">
                    </div>
                  </div>
<div class="form-group row">
<label class="col-sm-2 col-form-label">Total</label>
<div class="col-sm-10">
	<input type="text" value="<?=$onen['total']?? ''?>"  readonly  name="total" class="form-control"  >
</div>
</div>
<div class="form-group row">
<label class="col-sm-2 col-form-label">Delivery</label>
<div class="col-sm-10">
  <select  name="delivery">
	<option disabled selected></option>
	<option value="1" <?=($onen['delivery_id'] ?? null == '1') ? 'selected' : ''?>>Delivery 1</option>
	<option value="2"<?=($onen ['delivery_id']  ?? null == '2') ? 'selected' : ''?> >Delivery 2</option>
	<option value="3" <?=($onen ['delivery_id'] ?? null  == '3') ? 'selected' : ''?>>Delivery 3</option>
  </select>
</div>
</div>

<div class="form-group row">
<label class="col-sm-2 col-form-label">Payment</label>
<div class="col-sm-10">
  <select  name="payment">
	<option disabled selected></option>
	<option value="1" <?=($onen['payment_id'] ?? null == '1') ? 'selected' : ''?>>Payment 1</option>
	<option value="2" <?=($onen['payment_id']  ?? null == '2') ? 'selected' : ''?>>Payment 2</option>
	<option value="3" <?=($onen['payment_id'] ?? null  == '3') ? 'selected' : ''?>>Payment 3</option>
  </select>
</div>
</div>
<div class="form-group row">
<label class="col-sm-2 col-form-label">Comment</label>
<div class="col-sm-10">
	<input type="text" value="<?=$onen['comment']?? ''?>"  readonly  name="comment" class="form-control"  >
</div>
</div>
<div class="form-group row">
<label class="col-sm-2 col-form-label">Name</label>
<div class="col-sm-10">
	<input type="text" value="<?=$onen['name']?? ''?>"    name="name" class="form-control"  >
</div>
</div>
<div class="form-group row">
<label class="col-sm-2 col-form-label">Phone</label>
<div class="col-sm-10">
	<input type="text" value="<?=$onen['phone']?? ''?>"   name="phone" class="form-control"  >
</div>
</div>
<div class="form-group row">
<label class="col-sm-2 col-form-label">Email</label>
<div class="col-sm-10">
	<input type="text" value="<?=$onen['email'] ?? ''?>"   name="email" class="form-control"  >
</div>
</div>
<div class="form-group row">
<label class="col-sm-2 col-form-label">Status</label>
<div class="col-sm-10">
  <select  name="status">
	<option disabled selected></option>
	<?php foreach (OrderService::getstatuses() as $key=> $label) :?>
	<option value="<?=$key?>" <?=( $onen['status'] ?? null === $key ) 
	? 'selected' : ''?>><?=$label?></option>
	<?php endforeach;?>
	
  </select>
</div>
</div>
<div class="form-group row">
<label class="col-sm-2 col-form-label">Created</label>
<div class="col-sm-10">
	<input type="text" value="<?=$onen['created']?? ''?>" readonly  name="created" class="form-control"  >
</div>
</div>
<div class="form-group row">
<label class="col-sm-2 col-form-label">Updated</label>
<div class="col-sm-10">
	<input type="text" value="<?=$onen['updated']?? ''?>" readonly  name="updated" class="form-control"  >
</div>
</div>
<div class="form-group row">
<input type="submit" class="btn btn-success" value="Save">
</div>
</div>
</form>
 </div>
 </section>
</div>
<?php
include_once __DIR__ ."/../footer.php";
?>