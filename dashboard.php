<?php
session_start();
//print_r($_SESSION);
if(isset($_SESSION['login']) != "active")
{
  header( "Location: login.php" );
}
include 'header_without_body.php';
include 'footer.php';
include 'connection.php';

  /*if(empty($access)) {
      header("location:index.php"); 
      die();
  }*/
$reg_id=$_SESSION['id'];
$sql="select * from customer_list order by id desc";
$result=mysqli_query($con,$sql);

?>
   
  <nav class="navbar navbar-default" role="navigation">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle dropbtn" data-toggle="collapse" data-target=".navbar-collapse">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>    
  </div>
  <div class="navbar-collapse collapse">
    <ul class="nav navbar-nav navbar-right">
      <li><a href="create_customer.php">Create Customer</a></li>
     <!--  <li><a href="otp_login.php">Existing Customer</a></li> -->
      <li><a href="profile.php?reg_id=<?php echo $reg_id; ?>">Profile</a></li>
    </ul>
  </div>
</nav>
   <div class="container">
    <!--<div class="buttons">
      <a href="create_customer.php"><button class="btn btn-primary">New User</button></a>
      <a href="otp_login.php"><button class="btn btn-info">Existing User</button></a><br><br>
    </div>-->
  <div class="bg-table"> 
  <table class="table table-border no-bg" id="CustomerTable">

    <thead>
      <tr>
        <th>Customer Name</th>
        <th>Hotel Name</th>
        <th>Points</th>
        <th>Mobile No</th>
        <th>Login</th>
      </tr>
    </thead>
    <tbody class="white-bg">
       <?php foreach($result as $row){ ?>
        <tr>
          <input type="hidden" name="id" id="hidden" value="<?php echo $row['id']; ?>">
          <td><?php echo $row['customer_name'] ?></td>
          <td><?php echo $row['hotel_name'] ?></td>
          <td><?php echo $row['points']; ?></td>
          <td><?php echo $row['customer_mobno']; ?></td>
          <td><a href="otp_login.php?id=<?php echo $row['id']; ?>"><button class="btn btn-primary" id="login">Login</button></a></td>
        </tr>
      <?php }?>
    </tbody>
  </table>
</div>
</div>
<!-- <div class="container">
<div class="col-md-4"></div>
<div class="col-md-4 login-tbl-border align-middle">
	<a href="login.php"><button class="btn btn-secondary">Back</button></a>
	<div align="center">
		<a href="create_customer.php"><button class="btn btn-primary">New User</button></a><br><br>
		<a href="otp_login.php"><button class="btn btn-info">Existing User</button></a>
	</div>
</div>
</div> -->
<?php

/*}

else 
{
    //session_destroy();
    header( "Location: login.php" );
}*/
$pageWasRefreshed = isset($_SERVER['HTTP_CACHE_CONTROL']) && $_SERVER['HTTP_CACHE_CONTROL'] === 'max-age=0';

if($pageWasRefreshed ) {
   //do something because page was refreshed;
} 
else 
{
  // session_destroy();Use for future ldap_first_reference(link, result)
}
  
?>
<!--  <script>
  jQuery(document).ready(function(){alert("hello")
    jQuery('#login').click(function(){
      id = jQuery(this).val();alert(id);
      jQuery.ajax({
        url:'ajax_otp.php',
        type:'POST',
        data:{id : 'id'},
        success:function(data){
          alert(data);
        }
      })
    })
  })
</script> -->