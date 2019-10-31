<?php
include 'header.php';
include 'footer.php';
include 'connection.php';
session_start();
?>

<div class="container">
<div class="col-md-4"></div>
<div class="col-md-4 login-tbl-border">
<form method="POST"action="otpprocess.php">
	<h2 class="text-center">Login</h2><hr>
	<label>Enter OTP</label>
	<input type="text" class="form-control" name="otpvalue">
	<br>
	<button type="submit" class="btn btn-primary" name="send">Send</button>
</form>
<hr>
</div>
<div class="col-md-4"></div>
</div>