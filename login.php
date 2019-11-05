<?php 
ob_start();
session_start();
include 'header.php';
include 'footer.php';
include 'connection.php';


if(isset($_POST['login']))
{
	$fname=$_POST['fname'];
	$password=$_POST['password'];

	$sql = "SELECT id FROM register WHERE fname = '$fname' and password = '$password'";
    $result = mysqli_query($con,$sql);
    /*$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $active = $row['active'];*/
	$count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		foreach($result as $row)
    {
      $_SESSION['id']=$row['id'];
    }
    if($count == 1) 
    {
      $_SESSION['login']="active";
      echo "<p>Logged in successfully</p>";
      header( "Location: dashboard.php" );
    }
    else 
    {
        //echo "<p>Invalid username or password</p>";
    }
}
?>

<div class="container">
<div class="col-md-4"></div>
<div class="col-md-4 login-tbl-border vertical-center">
<form method="POST"action="">
	<h2 class="text-center">Login</h2><hr>
	<label>Username</label>
	<input type="text" class="form-control" name="fname" pattern="[A-Za-z]{1,32}">
	<label>Password</label>
	<input type="password" class="form-control" name="password">
	<br>
	<button type="submit" class="btn btn-primary" name="login">Login</button>
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
      alert("Please enter valid credentials");
    }
  })
</script>