<?php
session_start();
include 'header.php';
include 'footer.php';
include 'connection.php';

$_SESSION['id'] = $_GET['id'];
if(isset($_GET['id']))
{
  $id=$_GET['id'];
  $query = "select * from customer_list where id=$id";
  $result = mysqli_query($con,$query);
}
?>

<div class="container">
<div class="col-md-4"></div>
<div class="col-md-4 login-tbl-border">
<!-- <a href="dashboard.php"><button class="btn btn-secondary">Back</button></a> -->
<form method="POST" action="process.php">
	<h2 class="text-center">Login With OTP</h2><hr>
	<?php 
	foreach($result as $row){
	?>
	<label>Name</label>
	<input type="text" class="form-control" name="name" value="<?php echo $row['customer_name']; ?>" required>
	<label>Phone</label>
	<input type="text" class="form-control" name="phone" value="<?php echo $row['customer_mobno']; ?>" pattern="[789][0-9]{9}" required><br>
	<input type="submit" class="btn btn-primary" name="btn-save" value="Send">
	<?php 
	}
	?>
</form>
<hr>
</div>
<div class="col-md-4"></div>
</div>