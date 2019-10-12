<?php
  session_start();
  $db= mysqli_connect("localhost","root","","authentication");
  if(isset($_POST['registerbtn'])){
    $username=mysqli_real_escape_string($db,$_POST['username']);
    $email=mysqli_real_escape_string($db,$_POST['email']);
    $password=mysqli_real_escape_string($db,$_POST['password']);
    $password2=mysqli_real_escape_string($db,$_POST['password2']);

    if($password==$password2){
      $password=md5($password);
      $sql="INSERT INTO users(username,email,password,userStauts) VALUES ('$username','$email','$password','0')";
      mysqli_query($db,$sql);
      $_SESSION['message']= "You are sucessfully registered";
      $_SESSION['username']=$username;
    
    
      //random otp has been created 

      $otp= rand(1000,9999);
      $_SESSION['otp']=$otp;
      // email will be send to email for varificaton 

      require("PHPMailer-master/src/PHPMailer.php");
      require("PHPMailer-master/src/SMTP.php");
      require ("PHPMailer-master/src/autoload.php");
      include_once "PHPMailer-master/src/PHPMailer.php";
      include_once "PHPMailer-master/src/Exception.php";

      $mail = new PHPMailer\PHPMailer\PHPMailer(true);

      $mail->isSMTP();

      $mail->SMTPDebug = 2;

      $mail->Host = 'smtp.gmail.com';

      $mail->Port = 587;

      $mail->SMTPSecure = 'tls';

      $mail->SMTPAuth = true;

      $mail->Username = "coolveer.singh110@gmail.com";

      $mail->Password = "ushasingh";

      $mail->setFrom('no-reply@veer.com');

      $mail->addReplyTo('no-reply@veer.com');

      $mail->addAddress($email);

      $mail->Subject = 'Varification Email From Up Touriosm';

      $mail->Body = 'hello '.$username.' your OTP is '.$otp.'. Thanks for using our service . ';

      $mail->send();
      //redirected to the validation page 

      header("location: validation.php");
    }
    else{
      $_SESSION['message']= "The two password do not match";
    }
  }
 
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
    <div class="container dress">
        <div class="row">
           <div class="col-md-6"> 
           <form method="POST" action="registration.php">
<div class="form-group">
    <label for="name">Username:</label><br/>
    <input type="text" name="username" class="form-control" id="name">
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label></br>
     <input type="password" name="password" class="form-control" id="pwd">
   </div>
          
             </div>
            <div class="col-md-6">
                
              
  <div class="form-group">
    <label for="email">Email address:</label><br/>
    <input type="email" name="email" class="form-control" id="email">
  </div>
  <div class="form-group">
    <label for="pwd">confirmPassword:</label><br/>
    <input type="password" name="password2" class="form-control" id="pwd2">
  </div>
  
  <button type="submit" name="registerbtn" class="btn btn-default">Register </button>
</form>
            </div>
            
            
            
        </div>
    </div>
    
    
    
    
    
    
    
    
    
    
    
    
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" ></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" ></script>
</body>
</html>