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

		$myquery = "SELECT id FROM Users WHERE UserName = '$usr' and Password = '$pass'";
		$start = 1;
		$result = mysqli_query($db,$myquery);
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
		$active = $row['active'];

		//if successful there should be 1 row fetched
		//If unsuccesful it may be the case usernames are duplicated
		$count = mysqli_num_rows($result);

		if($count == 1) {
			$_SESSION['login_user'] = $usr;
			header("location: successlog.php");
		}else {
			$error = "Invalid Login";
		}
	}
?>
<html>
	<head>
	</head>
	<body>
		<div align = "center">
			<div>
			<div>Login</div>
				<div>
					<form action = "" method = "post">
						<label>UserName :</label><input type = "text" name = "username" class = "box"/><br /><br />
						<label>Password :</label><input type = "password" name = "password" class = "box" /><br/><br />
						<input type = "submit" value = " Submit "/><br />
					</form>
					<div><?php echo $error; ?></div>
				</div>
			</div>
			<a href="register.php">Sign Up</a>
		</div>

	</body>
</html>
