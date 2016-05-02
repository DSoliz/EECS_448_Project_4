<?php
include("config.php");
session_start();
date_default_timezone_set('America/Chicago');

//if user has a logged session going on it redirects them to succeslog.php
if(isset($_SESSION['login_user'])!=""){
	header("Location: successlog.php");
}

if(isset($_POST['signup_button'])){
	//preventing code injection
	$usr = mysqli_real_escape_string($db,$_POST['username']);
	$pass = mysqli_real_escape_string($db,$_POST['password']);
	$hash = password_hash($pass, PASSWORD_DEFAULT);
	$date = date("Y-m-d");

	//echo $usr . " " .$pass; //ucomment to check the POST values for usrname and pass

	$insertquery = "INSERT INTO Users (id,UserName,Password,confirmed,signup_date) VALUES (NULL, '$usr', '$hash','Y', '$date')";
		//!!WARNING!! NEED a method to check if username and password are valid for registration, with a boolean return ot plug into the if statement below
		if($usr != "" && $pass != "" && mysqli_query($db,$insertquery)){
?>
			<script>alert('Registration Successful');</script>
<?php
		}
		else{
?>
				<script>alert('ERROR While Registering');</script>
<?php
		}
}
?>
<html>
<head>
	<link href="login_register.css" rel="stylesheet" type="text/css"/>
	<title>Register</title>

</head>
<body>
	<center>
		<div id="div1">
			<br><div>Register</div><br>
			<div id="login-form" align="center">
				<form action ="" method="post">

						<label>UserName :</label><input type="text" name="username" required /><br /><br />
						<label>Password :</label><input type="password" name="password" required /><br /><br />

						<button type="submit" name="signup_button">Submit Registration</button><br /><br />
						<a href="login.php">Sign In Here</a>
				</form>
			</div>
		</div>
	</center>
</body>
