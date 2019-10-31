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
  mysqli_query($con,$sql2);
}

if(isset($_POST['redeem']))
{ 
  $hotel = $_POST['hotel'];
  $sql4="update hotel_history set points=0 where hotel_id=$latest_id and id=$sessionid";
  mysqli_query($con,$sql4);
}
?>
<form method="post" action="">
<div class="justify-content-center align-items-center">
  <?php foreach($result as $row)
  {
  ?>
  <p><label>Username:-</label>
  <?php echo $row['customer_name']; ?></p>
  <p><label>Mobile:-</label>
  <?php echo $row['customer_mobno']; ?></p>
  <p><label>Previous Hotel:-</label>
  <?php echo $row['hotel_name']; ?></p>
  <label>Hotel Name:-</label>
  <input type="text" class="form-control" name="hotel" value=""><br>
  <input type="submit" name="add" class="btn btn-primary" value="Add Rewards">
  <input type="submit" name="redeem" class="btn btn-danger" value="Redeem Rewards"> 
</div>
</form>
  <?php 
  }
  ?>
  <!-- <div class="container"> -->
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
 
<!-- </div> -->