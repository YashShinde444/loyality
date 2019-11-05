<?php 
include 'header.php';
include 'footer.php';
include 'connection.php';
if(isset($_POST['reset']))
{
	$old_password=$_POST['old_password'];
	$new_password=$_POST['new_password'];
	$confirm_password=$_POST['confirm_password'];

	$query1="select password from register where password='$old_password' ";
	$result=mysqli_query($con,$query1);//print_r($result);

	foreach ($result as $row)
	{
		$row_password = $row['password'];
	}
	if($row_password)
	{
		if($new_password == $confirm_password)
		{
			$query2 = "update register set password='$new_password',confirm_password='$confirm_password' where password = '$row_password' ";
			mysqli_query($con,$query2);
			 header( "Location: profile.php" );
		}
		else
		{
			echo "<p style='color:white;'>Please enter valid password</p>";
		}
	}
}
if(isset($_GET['id']))
{
	$id=$_GET['id'];
	$query3="select * from register where id=$id";
	$result1=mysqli_query($con,$query3);
}
?>
<div class="container">
<div class="col-md-4"></div>
<div class="col-md-4 login-tbl-border">
<form method="POST"action="">
	<h2 class="text-center">Reset Password</h2><hr>
	<h3><?php 
	foreach($result1 as $row1)
	{
		echo $row1['fname'];
	}
	?></h3>
	<label>Old Password</label>
	<input type="text" class="form-control" name="old_password">
	<label>New Password</label>
	<input type="text" class="form-control" name="new_password">
	<label>Confirm Password</label>
	<input type="text" class="form-control" name="confirm_password">
	<br>
	<button type="submit" class="btn btn-primary" name="reset">Reset</button>
</form>
<hr>
</div>
<div class="col-md-4"></div>
</div>