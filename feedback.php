<?php

  session_start();

  //connect to database
  $con = mysql_connect("localhost","root","akanshika","uptourism");

    if(isset($_POST['submit'])){
    	session_start();
    	$a=mysql_real_escape_string($_POST['place']);
        $b=mysql_real_escape_string($_POST['query']);
        
        $sql = "INSERT INTO feedback(place_name,user_qurry) VALUES('$a','$b')";
        	mysqli_query($con,$sql);
    }
?>        

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="master.css">

</head>
<body>
	<form method="post" action="feedbck.php">
	<div id="header"><h1>U.P. TOURISM</h1></div>
	<div id="menu">
		<ul>
			<li><a href="home.html"> HOME</a></li>
			<li><a href="lucknowzone.html"> LUCKNOW ZONE</a></li>
			<li><a href="bareilyzone.html"> BAREILY ZONE</a></li>
			<li><a href="meerutzone.html"> MEERUT ZONE</a></li>
			<li><a href="agrazone.html"> AGRA ZONE</a></li>
			<li><a href="kanpurzone.html"> KANPUR ZONE</a></li>
			<li><a href="allahabadzone.html"> ALLAHABAD ZONE</a></li>
			<li><a href="varanasizone.html"> VARANASI ZONE</a></li>
			<li><a href="gorakhpurzone.html"> GORAKHPUR ZONE</a></li>
			<li><a href="">FEEDBACK</a></li>
		</ul>
	</div>
	<div id="slider">
		<div class="info">
			<div class="qurry">
				<div class="textbox">
			
			<input type="text" placeholder="Place" name="place">
		</div>
			<div class="textbox">	
			<textarea cols="16" rows="4" name="query" placeholder="Qurry"></textarea>
		</div>
		<input class="submit" type="button" name="submit" value="submit">
		</div>
		</div>
		<figure>
		<img src="_ganga_ghat_11.jpg" style="height: 600px;" >
		<img src="agra-fort.jpg" style="height: 600px;">
		<img src="_ganga_ghat_11.jpg" style="height: 600px;">
		<img src="istock-478831658.jpg" style="height: 600px;">
		<img src="agra-fort.jpg"style="height: 600px;">
	</figure>
</div>
	<div id="footer">link</div>
</form>
</body>
</html>