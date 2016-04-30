<?php
	include("session.php");
	if(isset($_SESSION['login_user'])==""){
		header("Location: login.php");
	}else{
		header("Location: Chatroom/chatroom.php");
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
