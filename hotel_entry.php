<?php
session_start();
include 'header_without_body.php';
include 'footer.php';
include 'connection.php';
$sessionid = $_SESSION['id'];
$sql="select * from customer_list where id=$sessionid";
$result=mysqli_query($con,$sql);


$sessionid = $_SESSION['id'];
$sql1 = "select * from hotel_history where id = $sessionid";
$result1 = mysqli_query($con,$sql1);

$sql3 = "select hotel_id,points from hotel_history where hotel_id=(select MAX(hotel_id) from hotel_history where id=$sessionid)";
$result2 = mysqli_query($con,$sql3);
//Code to get previous hotel points count
foreach($result2 as $row2)
{
  $latest_id = $row2['hotel_id'];
  $count=$row2['points'];
}
echo "<pre></pre>";
if(isset($_POST['add']))
{ 
  $hotel = $_POST['hotel'];
  $sql2 = "insert into hotel_history(id,hotel_name,date,points) values($sessionid,'$hotel',CURDATE(),$count + 50)";
  $sql5 = "update customer_list set hotel_name = '$hotel',points=$count + 50 where id=$sessionid";
  mysqli_query($con,$sql2);
  mysqli_query($con,$sql5);
}

if(isset($_POST['redeem']))
{ 
  $hotel = $_POST['hotel'];
  $sql4="insert into hotel_history(id,hotel_name,date,points) values($sessionid,'$hotel',CURDATE(), 0)";
  $sql6 = "update customer_list set points=0 where id=$sessionid";
  mysqli_query($con,$sql4);
  mysqli_query($con,$sql6);
}
?>

<div class="container">
	<form method="POST">
	<table class="table table-bordered">
		<tr>
			<th><label>Hotel Name</label></th>		
			<th><label>Room Type</label></th>
			<th><label>Check in</label></th>
			<th><label>Check out</label></th>
			<th><label>Billable Amount</label></th>
			<th><label>Points</label></th>
		</tr>
		<tr>
			<td><input class="form-control" type="text" name="hotel"></td>
			<td>
				<select class="form-control" name="room">
					<option>--Select--</option>
					<option>Double bed AC</option>
					<option>Double bed Non AC</option>
					<option>Single bed AC</option>
					<option>Single bed Non AC</option>
				</select>
			</td>
			<td><input class="form-control" type="text" name="checkin"></td>
			<td><input class="form-control" type="text" name="checkout"></td>
			<td><input class="form-control" type="text" name="bill"></td>
			<td>
				<input class="form-control" type="text" name="points"><br>
				<input class="btn btn-primary" type="submit" name="add" value="Rewards">
				<input class="btn btn-danger" type="submit" name="redeem" value="Redeem">
			</td>
		</tr>
	</table>
	</form>
</div>

 <div class="bg-table"> 
  <table class="table table-border no-bg" id="CustomerTable">
    <thead>
      <tr>
        <th>Hotel Name</th>
        <th>Date</th>
        <th>Points</th>
      </tr>
    </thead>
    <tbody class="white-bg">
       <?php foreach($result1 as $row1){ ?>
        <tr>
          <input type="hidden" name="id" id="hidden" value="<?php echo $row['id']; ?>">
          <td><?php echo $row1['hotel_name'] ?></td>
          <td><?php echo $row1['date'] ?></td>
          <td><?php echo $row1['points'] ?></td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
 </div>