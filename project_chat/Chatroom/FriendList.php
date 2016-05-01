<?php
include("include_methods.php"); //Includes session.php

//Where getFriends( is friend )[ id ]
$friends_by_id = getFriends(1)[0]; //Friends by id
//Where getFriends( is friend )[ name string ]
$u_friend_str = getFriends(1)[1]; //Friend array by name



for($i = 0; $i < sizeof($friends_by_id); $i++){
	$friend_id = $friends_by_id[$i];
	$friendQuery = "SELECT UserName FROM Users WHERE id = $friend_id ";
	if($result = $db->query($friendQuery)){
		$row_friend = $result->fetch_assoc();
		array_push($u_friend_str, $row_friend['UserName']);

		$result->free();
	}
}

$outString = "";
for($i = 0; $i < sizeof($friends_by_id); $i++){
	$friend_id = $friends_by_id[$i];
	$friend_str = $u_friend_str[$i];



	echo ($u_friend_str[$i] . "<button type='submit' name = 'start_chat' value='$friend_id'>CHAT</button>
	<button type='submit' name = 'unFriend' value='$friend_id'>UNFRIEND</button><br/>"); //Need to add start chat Button
}

$db->close();
?>
