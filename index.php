<?php
session_start();
$conn=mysqli_connect("localhost","root","","authentication");


if (isset($_POST['isubmit'])) 
{
$email=mysqli_real_escape_string($conn,$_POST['email']);
$password=mysqli_real_escape_string($conn,$_POST['password']);

$sql="SELECT * FROM users WHERE email='$email'";
$result=mysqli_query($conn,$sql);
$data=mysqli_fetch_assoc($result);
if ($email==$data['email'] ) 
{
  $password=md5($password);
if ($password==$data['password'])
{
  $_SESSION['id']=$data['id'];
  $_SESSION['username']=$data['username'];
  $_SESSION['email']=$data['email'];

  header("Location:home.html");
  exit();
  }
  else
  {
  header("Location:index.php?login=wrong");
  exit();
  }

}
else 
{
  header("Location:index.php?login=wrong");
  exit();
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
           <p class="slam">UP Tourism </p>
           <p class="live"> make your holidays more than awesome  <br>
           we are cheap and best in our state <br>
           New here ? what are you wating for just <a href="registration.php"><button type="button" class="btn btn-primary btn-md">Signup</button></a>
           </p>
            </div>
            <div class="col-md-6">
                
                <form method="post" action="index.php">
  <div class="form-group">
    <label for="email">Email address:</label><br/>
    <input type="email" class="form-control" name="email" id="email">
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label><br/>
    <input type="password" class="form-control" name="password" id="pwd">
  </div>
  <span style="color: red; font-size: 20px;">
   <?php
      if (isset($_GET['login'])) 
      {
       
        if ($_GET['login']=="wrong")   
        {
          echo "<p class='yel'>You have given a wrong e-mail or password!!</p>";
        }
        
      }
       ?>
       </span>
  
  <button type="submit" class="btn btn-default" name="isubmit">Log In </button>
</form>
            </div>
            
            
            
        </div>
    </div>
    
    
    
    
    
    
    
    
    
    
    
    
    
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" ></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" ></script>
</body>
</html>