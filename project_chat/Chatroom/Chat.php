<?php
include("../session.php");
error_reporting(E_ALL);
ini_set("display_errors", 1);
$noOtherUser = false;
if(!isset($_SESSION['login_user'])){
	$nickName = $_SESSION['login_user'];
	$noOtherUser = true;
}
//error checking
if($_SESSION['login_user'] == ""){
	echo "User ID may not be blank";
}
else{
	$temp = $_SESSION['login_user'];
	$query = "INSERT INTO Chat (nickname) VALUES ('$temp')";
	$query2 = "SELECT nickname FROM Chat";
	if($result = $db->query($query2)){
		while ($row = $result->fetch_assoc()){
			if($_SESSION['login_user']== $row["nickname"])
			{
				$noOtherUser = false;
			}
		}
		$result->free();
	}
	if($noOtherUser){
		if($result = $db->query($query))
		{
		}
	}
	$db->close();
}
?>
<html>
	<head>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script type="text/javascript" src="Post.js"></script>
		<script type="text/javascript"src="Lists.js"></script>
		<script>
		window.onpageshow = function(event) {
			if (event.persisted) {
				window.location.reload();
			}
		};
		</script>
		<link href="Chat.css" rel="stylesheet" type="text/css"/>
	</head>

	<body>
		<div> Notifications:
			<div id = "notifications">
				<form id="friendRequests" action= "javascript:alert( 'submited' );"></form> <br/>

				<div id = "notify_actions"></div>
			</div>
		</div>

		<form action="chatroom.php" method="GET" id="form">
			<button type="submit" >Enter Public Chat</button>
		</form>

		<form>

			<label> Search for User </label>
			<input type="text" name="usersearch" id="usersearch">
		</form>
			<div>
				<form id="users" action= "javascript:alert( 'Request Sent' );"></form> <br/>
			</div>


		<form>
			<label> Friend List </label>
			<input type="text" name="friend_filter" id="friend_filter">
		</form>
			<div>
				<form id="userFriendList" action = "private_chatroom.php" method = "POST" ></form> <br/>
			</div>

		<form action="../logout.php">
			<button type="submit">LOGOUT</button>
		</form>
	</body>
</html>
