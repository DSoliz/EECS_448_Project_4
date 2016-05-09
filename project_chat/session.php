<?php
	session_start();
	include("config.php");
	error_reporting(E_ALL);
	ini_set("display_errors", 1);

	if(!isset($_SESSION['login_user'])){
		header("location: /login.php"); //Place absolute path to login .php to prevent path errors
	}

	$user_check = $_SESSION['login_user'];
	//check if user is in the database
	$ses_sql = mysqli_query($db,"SELECT id, UserName FROM Users WHERE UserName = '$user_check' ");

	//Where MYSQLI_ASSOCiative crates and array of the type ['value1','value2','value3'].
	$row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

	//uncomment any, both print the User's Username
	//echo implode(" ",$row);
	//echo $row['username'];

	$login_session = $row['UserName'];
	$_SESSION['id'] = $row['id'];

	//Use this variable for Current USER ID!!
	$id = $_SESSION['id'];
	//

	//////////////////////////////////////////////
	//NEED METHOD TO ADD USER TO ONLINE DATABASE
	//OR CHANGE HIS STATUS TO ONLINE IF OTHER USER IS FRIEND
	//////////////////////////////////////////////

	//isset determines if a variable is set and not null
	//If it is null it sends user to the login page
?>
