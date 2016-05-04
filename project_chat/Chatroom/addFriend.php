<?php
	include("../session.php");
	//call this using jquery

	$requestReceiver = $_POST['toAdd'];

	echo "Request Sent to USER ID: " . $requestReceiver;

	$user_to_friend= "INSERT INTO Friends (friend_one,friend_two) VALUES ('$id','$requestReceiver')";
	//$friend_to_user= "INSERT INTO friends (friend_one,friend_two) VALUES ('$requestReceiver','$id')";
	/*
	The above should return a table of the following form where user id 1 added user id 2
	Status 0 for pending request
	+------------+------------+--------+
	| friend_one | friend_two | status |
	+------------+------------+--------+
	|          1 |          2 | 0      |
	+------------+------------+--------+
	*/

	$db->query($user_to_friend);
	//$db->query($friend_to_user);

	$db->close();

 ?>
