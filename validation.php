<?php
session_start();
  $db= mysqli_connect("localhost","root","","authentication");
 $_SESSION['username'];
  if(isset($_POST['otpbtn'])){
  	$uotp = $_POST['userOtp'];
  	

  	if($_SESSION['otp'] == $uotp){
  		$sql="UPDATE users
		SET userStauts = '1'
		WHERE username=".$_SESSION['username'].";";
		mysqli_query($db,$sql);
  		header("location: home.html");
  }else{
 header("location:notverified.html");
};
};




?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Faster+One|Kirang+Haerang" rel="stylesheet">
    
    <title>UP Tourism</title>
</head>
<body>


	<div class="container">
		<div class="row d-flex justify-content-center">
			<h1 > Enter the OTP that has been arrived in your email :</h1>
			<div class="col-md-4 ">
				  <form method="POST" action="validation.php">
						<div class="form-group">
    						<label for="userOtp">OTP here :</label><br/>
    						<input type="text" name="userOtp" class="form-control" >
 					 	</div>
    
  						<button type="submit" name="otpbtn" class="btn btn-danger">Verify me ! </button>
					</form>
			</div>
		</div>
	</div>














<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" ></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" ></script>
</body>
</html>