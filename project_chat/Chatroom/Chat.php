<?php
include("../session.php");

error_reporting(E_ALL);
ini_set("display_errors", 1);

$noOtherUser = false;
if(!isset($_SESSION['login_user']))
{
    $nickName = $_SESSION['login_user'];
    $noOtherUser = true;
}
//error checking
if($_SESSION['login_user'] == "")
{
	echo "User ID may not be blank";
}
else
{

	$temp = $_SESSION['login_user'];

	$query = "INSERT INTO Chat (nickname) VALUES ('$temp')";
	$query2 = "SELECT nickname FROM Chat";

	if($result = $db->query($query2))
	{
		while ($row = $result->fetch_assoc())
		{
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
	else
	{
		//echo "<script type='text/javascript'>alert('A person with that nickname is in the chat room');</script>";
	}

	$db->close();
}
?>

<html>
	<head>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script type="text/javascript" src="Post.js"></script>
		<script type="text/javascript"src="UserList.js"></script>
	</head>

	<body>
		<div style="width:300px; height: 300px;background-color:black; color:white; padding:10px; overflow-y: scroll;" id="test"> Welcome to the Pre Chat Room </div>

		<form action="chatroom.php" method="GET" id="form">
			<input type="submit" value="Enter Chat">
		</form>

		<form>
			<label> Search for User </label>
			<input type="text" name="usersearch" id="usersearch">

			<div id="userson"></div>
		</form>

		<form>
			<label> Friend List </label>
			<input type="text" name="friend_filter" id="friend_filter">

			<div id="userFriendList"></div>
		</form>
	</body>
</html>
