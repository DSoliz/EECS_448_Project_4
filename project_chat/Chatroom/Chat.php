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
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
		<link rel="stylesheet" href="https://code.getmdl.io/1.1.3/material.indigo-pink.min.css">
		<script defer src="https://code.getmdl.io/1.1.3/material.min.js"></script>
		<link href="Chat.css" rel="stylesheet" type="text/css"/>
	</head>

	<body>
		<center>
			<div class="grid">
					<div class="col-1-3glass">
						<form>

							<div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
							    <label class="mdl-button mdl-js-button mdl-button--icon" for="friend_filter">
							      <i class="material-icons">search</i>
							    </label>
							    <div class="mdl-textfield__expandable-holder">
							      <input class="mdl-textfield__input" type="text" id="friend_filter">
							      <label class="mdl-textfield__label" for="friend_filter"></label>
							    </div>
							  </div>Search Friends
						</form>
						<form id="userFriendList" action = "private_chatroom.php" method = "POST" ></form>
					</div>

					<div class="col-1-3glass">
						<form>

							<div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
							    <label class="mdl-button mdl-js-button mdl-button--icon" for="usersearch">
							      <i class="material-icons">search</i>
							    </label>
							    <div class="mdl-textfield__expandable-holder">
							      <input class="mdl-textfield__input" type="text" id="usersearch">
							      <label class="mdl-textfield__label" for="usersearch"></label>
							    </div>
							  </div>Search Users
						</form>
						<form id="users" action= "javascript:alert( 'Request Sent' );"></form>

					</div>

					<div class="col-1-3glass">
						<br>
						<div>Notifications:</div>
						<div id = "notifications">
							<form id="friendRequests" action= "javascript:console.log( 'submited' );"></form> <br/>
							<div id = "notify_actions"></div>
						</div>
						<form action="../logout.php">
							<button class="mdl-button mdl-js-button mdl-button-- mdl-color--orange">LOGOUT</button>
						</form>
						<form action="chatroom.php" method="GET" id="form">
							<button class="mdl-button mdl-js-button mdl-button-- mdl-color--orange">Enter Public Chat</button>
						</form>
					</div>
			</div>
		</center>
	</body>
</html>
