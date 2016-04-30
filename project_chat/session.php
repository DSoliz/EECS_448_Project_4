<?php
	include("config.php");
	session_start();

	$user_check = $_SESSION['login_user'];
	//check if user is in the database
	$ses_sql = mysqli_query($db,"SELECT id, username FROM Users where UserName = '$user_check' ");

	//Where MYSQLI_ASSOCiative crates and array of the type ['value1','value2','value3'].
	$row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

	//uncomment any, both print the User's Username
	//echo implode(" ",$row);
	//echo $row['username'];

	$login_session = $row['username'];
	$_SESSION['id'] = $row['id'];
	$id = $_SESSION['id'];

	//isset determines if a variable is set and not null
	//If it is null it sends user to the login page
	if(!isset($_SESSION['login_user'])){
		header("location: /login.php"); //Place absolute path to login .php to prevent path errors
	}
?>
