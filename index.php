<?php 
include 'header.php';
include 'footer.php';
include 'connection.php';

/*$access = 'my_value';*/

if(isset($_POST['register']))
{
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$email=$_POST['email'];
	$mobno=$_POST['mobno'];
	$dob=$_POST['dob'];
	$password=$_POST['password'];
	$confirm_password=$_POST['confirm_password'];

	if($password == $confirm_password)
	{
		$sql="insert into register(fname,lname,email,mobno,dob,password,confirm_password) values('$fname','$lname','$email','$mobno','$dob','$password','$confirm_password')";
		if(mysqli_query($con,$sql))
		{
			echo "<h3>Registered successfully</h3>";
		}
		else
		{
			echo "Invalid";
		}
	}
	else
	{
		echo "<p>Please enter correct password</p>";
	}
}
?>
<div class="container">
<div class="col-md-4"></div>
<div class="col-md-4 login-tbl-border">
<form method="POST" action="">
	<h2 class="text-center">Registration</h2><hr>
	<label>First Name</label>
	<input type="text" class="form-control" name="fname" pattern="[A-Za-z]{1,32}" required>
	<label>Last Name</label>
	<input type="text" class="form-control" name="lname" pattern="[A-Za-z]{1,32}" required>
	<label>Email</label>
	<input type="email" class="form-control" name="email">
	<label>Mobile No</label>
	<input type="text" class="form-control" name="mobno" pattern="[789][0-9]{9}" required>
	<label>DOB</label>
	<input type="date" class="form-control" name="dob" required>
	<label>Password</label>
	<input type="password" class="form-control" name="password" required>
	<label>Confirm Password</label>
	<input type="password" class="form-control" name="confirm_password" required><br>
	<input type="submit" class="btn btn-primary" name="register" value="Register">
</form>
<hr>
<p>Already have account?<a href="login.php">Login</a></p>
</div>
<div class="col-md-4"></div>
</div>