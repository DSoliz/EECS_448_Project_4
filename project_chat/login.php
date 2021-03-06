<?php
	include("config.php");
	session_start();
	//if user has a session going on it redirects them to succeslog.php
	if(isset($_SESSION['login_user'])!=""){
		header("Location: successlog.php");
	}

	if($_SERVER["REQUEST_METHOD"] == "POST") {

		//prevents code injection
		$usr = mysqli_real_escape_string($db,$_POST['username']);
		$pass = mysqli_real_escape_string($db,$_POST['password']);

		$myquery = "SELECT id,Password FROM Users WHERE UserName = '$usr'";
		$start = 1;
		$result = mysqli_query($db,$myquery);
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
		$active = $row['active'];

		//if successful there should be 1 row fetched
		//If unsuccesful it may be the case usernames are duplicated
		$count = mysqli_num_rows($result);

		if($count == 1)
		{
			if(password_verify($pass, $row[Password])) {
				$_SESSION['login_user'] = $usr;
				header("location: successlog.php");
			}else {
				$error = "Invalid Login";
			}
		}
		else
		{
			$error = "User does not exist";
		}
	}
?>
<html>
<head>

	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://code.getmdl.io/1.1.3/material.indigo-orange.min.css">
	<script defer src="https://code.getmdl.io/1.1.3/material.min.js"></script>
	<link href="login_register.css" rel="stylesheet" type="text/css"/>
	<title>Login</title>
</head>
<body>
	<div id="div1" align = "center" >
		<br><div>Login</div><br>
			<div>
				<form action = "" method = "post">
					<label>UserName :</label><input type = "text" name = "username" class = "box"/><br /><br />
					<label>Password :</label><input type = "password" name = "password" class = "box" /><br/><br />
					<button class="mdl-button mdl-js-button mdl-button-- mdl-color--orange">Submit</button>
				</form>
				<div><?php echo ""; ?></div>
			</div>
		<a href="register.php">Sign Up</a>
	</div>

</body>
</html>
