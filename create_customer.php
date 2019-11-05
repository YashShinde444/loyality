<?php
include 'header.php';
include 'footer.php';
include 'connection.php';

if(isset($_POST['add_customer']))
{  
	$customer_name=$_POST['customer_name'];
	$hotel=$_POST['hotel'];
	//$points=$_POST['points'];
	$customer_mobno=$_POST['customer_mobno'];
	$sql="insert into customer_list(customer_name,hotel_name,customer_mobno) values('$customer_name','$hotel',$customer_mobno)";
	$result=mysqli_query($con,$sql);
	if($result)
	{
		$count=1;
		header( "Location: dashboard.php" );
	}
	else
	{
		$count=0;
	}

}

?>

<div class="container">
<div class="col-md-4"></div>
<div class="col-md-4 login-tbl-border">
<!-- <a href="login.php"><button class="btn btn-secondary">Back</button></a> -->
<form method="POST">
	<h2 class="text-center">Customer Registration</h2><hr>
	<label>Customer Name</label>
	<input type="text" class="form-control" name="customer_name" required>
 	<label>Hotel</label>
	<input type="text" class="form-control" name="hotel">
	<label>Customer Mobile</label>
	<input type="text" class="form-control" name="customer_mobno" required><br>
<!-- 	<label>Points</label>
	<input type="text" class="form-control" name="points" required><br> -->
	<input type="submit" class="btn btn-primary" name="add_customer" value="Register">
</form>
<hr>
</div>
<div class="col-md-4"></div>
</div>
<script>
  $(document).ready(function(){
    count = "<?php echo $count; ?>";//alert(count);
    if(count == 0)
    {
      alert("Please unique mobile number");
    }
  })
</script>