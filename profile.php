<?php 
include 'header.php';
include 'footer.php';
include 'connection.php';
if(isset($_POST['logout']))
{
  session_destroy();
  header('location:index.php');
}
if(isset($_GET['reg_id']))
{
  $id=$_GET['reg_id'];
}
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
      <li><a href="reset_password.php?id=<?php echo $id; ?>">Reset Password</a></li>
      <!-- <li><a href="login.php">Logout</a></li> -->
      <li><form method="POST">
        <input class="btn btn-primary" type="submit" name="logout" value="Logout">
      </form></li>
    </ul>
  </div>
</nav>
