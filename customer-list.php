<?php 
include 'header_without_body.php';
include 'footer.php';
include 'connection.php';


	    /*if (realpath(__FILE__)) 
	    {
	    
	    	header( 'HTTP/1.0 403 Forbidden', TRUE, 403 );
	        die( header( 'location: /loyality_module2/otp_login.php' ) );

	    }*/


$sql="select * from customer_list";
$result=mysqli_query($con,$sql);
?>

 <div class="container">
    <!-- <div class="buttons">
      <a href="create_customer.php"><button class="btn btn-primary">New User</button></a>
      <a href="otp_login.php"><button class="btn btn-info">Existing User</button></a><br><br>
    </div> -->
  <div class="bg-table">
  <table class="table table-border no-bg" id="CustomerTable">

    <thead>
      <tr>
        <th>Customer Name</th>
        <th>Hotel Name</th>
        <th>Points</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody class="white-bg">
       <?php foreach($result as $row){ ?>
        <tr>
          <td><?php echo $row['customer_name'] ?></td>
          <td><?php echo $row['hotel_name'] ?></td>
          <td><?php echo $row['points']; ?></td>
          <td><a href="show_rewards.php?id=<?php echo $row['id'] ?>"><button class="btn btn-success">Rewards</button></a></td>
        </tr>
      <?php }?>
    </tbody>
  </table>
</div>
</div>