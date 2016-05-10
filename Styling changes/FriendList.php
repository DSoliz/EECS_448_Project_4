<?php
include("include_methods.php"); //Includes session.php

//Where getFriends( is friend )[ id ]
$friends_by_id = getFriends(1)[0]; //Friends by id
//Where getFriends( is friend )[ name string ]
$u_friend_str = getFriends(1)[1]; //Friend array by name

$u_friends_on = array();

for($i = 0; $i < sizeof($friends_by_id); $i++){
	$friend_id = $friends_by_id[$i];
	$friend_Query = "SELECT UserName FROM Users WHERE id = $friend_id ";
	if($result = $db->query($friend_Query)){
		$row_friend = $result->fetch_assoc();
		array_push($u_friend_str, $row_friend['UserName']);
		$result->free();
	}
}
for($i = 0; $i < sizeof($friends_by_id); $i++){
	$friend_id = $friends_by_id[$i];
	$online_Query = "SELECT id FROM Online WHERE id = $friend_id";
	if($result = $db->query($online_Query)){
		$row_online = $result->fetch_assoc();
		array_push($u_friends_on, $row_online['id']);
		$result->free();
	}
}


$outString = "";
for($i = 0; $i < sizeof($friends_by_id); $i++)
{
	$friend_id = $friends_by_id[$i];
	$friend_str = $u_friend_str[$i];
	$online_stat = "Offline";
	if(in_array($friend_id, $u_friends_on))
	{
		$online_stat = "Online";
	}
	echo ($u_friend_str[$i] . "<button class='mdl-button mdl-js-button mdl-button-- mdl-color--orange'  type='submit' name = 'start_chat' value='$friend_id'>CHAT</button>
	<button class='mdl-button mdl-js-button mdl-button-- mdl-color--orange' type='submit' name = 'unFriend' value='$friend_id'>UNFRIEND</button>$online_stat<br/><br/>");
}

$db->close();
?>

