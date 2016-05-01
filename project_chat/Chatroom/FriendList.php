<?php
include("../session.php");
date_default_timezone_set('America/Chicago');

error_reporting(E_ALL);
ini_set("display_errors", 1);

$u_friends = array(); //Friends by id
$u_friend_str = array(); //Friend array by name

$query = "SELECT friend_two FROM Friends where friend_one = '$id' and status = 1";

if($result = $db->query($query)){
	while($row_friend = $result->fetch_assoc()){
		array_push($u_friends, $row_friend['friend_two']); //This will be pushing friend id's into $u_friends
	}
	$result->free();
}

for($i = 0; $i < sizeof($u_friends); $i++){
	$friend_id = $u_friends[$i];
	$friendQuery = "SELECT UserName FROM Users WHERE id = $friend_id ";
	if($result = $db->query($friendQuery)){
		$row_friend = $result->fetch_assoc();
		array_push($u_friend_str, $row_friend['UserName']); //This will be pushing friend id's into $u_friends

		$result->free();
	}
}
for($i = 0; $i < sizeof($u_friends); $i++){
	echo $u_friend_str[$i] . "<br>";
}

if(!isset($_POST['inpfr']))
{
	return;
}
?>
