<?php
	include("session.php");
	if(isset($_SESSION['login_user'])==""){
		header("Location: login.php");
	}else{
		$isonline_query = "INSERT INTO Online (id, username) VALUES ('$id','$login_session')";
		$db->query($isonline_query);
		header("Location: Chatroom/Chat.php");
	}
?>
<html>
	<head>
	</head>
	<body>
		<p>Hi <?php echo $login_session; ?></p>
		<p><a href = "logout.php">Sign Out</a></p>
	</body>

</html>
