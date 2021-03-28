<?php
include_once __DIR__ ."/../site/header.php";
?>

<div class="width1024">
<h1>Create Order<h1>
<form action="/frontend/?model=order&action=create" method="post">
<div>
<label>Name:</label><input type="text" name="name">
</div>
<div>
<label>Phone:</label><input type="text" name="phone">
</div>
<div>
<label>Email:</label><input type="email" name="email">
</div>
<div>
<label>Delivery:</label>
<select  name="delivery">
<option value="1" >Delivery 1</option>
<option value="2" >Delivery 2</option>
<option value="3" >Delivery 3</option>
</select>
</div>
<div>
<label>Payment:</label>
<select  name="payment">
<option value="1" >Payment 1</option>
<option value="2" >Payment 2</option>
<option value="3" >Payment 3</option>
</select>
</div>
<div>
<label>Comment</label><br>
<textarea name="comment"></textarea>
</div>
<div>
<button>Create</button>
</div>
</form>
</div>
<?php
include_once __DIR__ ."/../site/footer.php";
?>