<?php 
include 'header_without_body.php';
include 'footer.php';
include 'connection.php';

if(isset($_GET['id']))
{
  $id=$_GET['id'];
  $query = "select * from customer_list where id=$id";
  $result = mysqli_query($con,$query);
}
if(isset($_POST['edit']))
{
  $rewards=$_POST['rewards'];
  $query1 = "update customer_list set points=$rewards where id=$id";
  mysqli_query($con,$query1);
  header("location:customer-list.php");
}
?>

<div class="container">
<div class="col-md-4"></div>
<div class="col-md-4 login-tbl-border vertical-center">
<form method="POST" action="">
	<h2 class="text-center">Customer Profile</h2><hr>
  <?php foreach($result as $row)
  {
  ?>
	<p><label>Username:-</label>
  <?php echo $row['customer_name']; ?></p>
	<p><label>Mobile:-</label>
	<?php echo $row['customer_mobno']; ?></p>
  <p><label>Hotel:-</label>
  <?php echo $row['hotel_name']; ?></p>
  <label>Update Rewards</label>
  <input type="text" class="form-control" name="rewards" value="<?php echo $row['points']; ?>">
  <?php 
  }
  ?>
	<br>
	<input type="submit" name="edit" class="btn btn-success">
</form>
<hr>
</div>
<div class="col-md-4"></div>
</div>