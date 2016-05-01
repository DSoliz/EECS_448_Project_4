<?php
	include("../session.php");
	$_SESSION['friend_id'] = $_POST['start_chat'];
?>
<script type="text/javascript"src="private_chatroomMethods.js"></script>

<html>
	<head>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"> </script>
		<link href="ChatStyle.css" rel="stylesheet" type="text/css"/>
	</head>
	<body>

		<div id="chatBox" align="left"></div>

		<br>
		<textarea
		onkeydown="if (event.keyCode == 13) { this.form.submit(); return false; }"
		name="message" rows="2" cols="40" id="textInput" form="myform"></textarea>
		<br> <br> <br> <br> <br>

		<form action="javascript:SendMessage()" method="POST" id="myform" name="textPost">
			<input type="submit" value="Post message">
		</form> <br> <br> <br>

		<form action="Chat.php">
			<input type="submit" value="Return to Pre-Chat">
		</form> <br> <br> <br>

		<form action="../logout.php">
			<input type="submit" value="Logout">
		</form>
	</body>
</html>
