<?php
//TO DO
//This should allow to search all users and allow to send friend request
//It should also display online USERS for testing puroposees and checking if everything is working fine.

include("include_methods.php"); //Includes session.php

date_default_timezone_set('America/Chicago');

error_reporting(E_ALL);
ini_set("display_errors", 1);

$Users = array();
$UsersID = array();

$friends_by_id = getFriends(1)[0];
$friends_by_id_pending = getFriends(0)[0];
$discriminate = array_merge($friends_by_id,$friends_by_id_pending);

//can re use query to see users online
$query = "SELECT username, id FROM Users WHERE id != $id";

//									TO DO
//Need to instert username to Online database upon loading Chat.php or login.
//Logout removes user from the base
//If the user hasn't been active for a time expire his session and remove from the online base

if($result = $db->query($query)){
	while($row = $result->fetch_assoc()){
		array_push($Users, $row['username']);
		array_push($UsersID, $row['id']);
	}
	$result->free();
}

//$notFriends = "<form action='addFriend.php' method='POST'>" . $Users[$i] . "<button type='submit' value='"$userid[$i]"'>AddFriend</button></form><br/>";

if(isset($_POST['inp'])){
	$searchTerm = $_POST['inp'];
}else{
	$searchTerm = "";
}

$toDisplay = "";

for($i = 0; $i < sizeof($Users); $i++)
{
	
	if($searchTerm == "")
	{
		$contains = true;
	}
	else
	{
		$contains = strpos($Users[$i], $searchTerm);
	}
		
	if($contains !== false)
	{
		if (in_array( $UsersID[$i] , $discriminate))
		{
			if(in_array($UsersID[$i], $friends_by_id_pending))
			{
				$toDisplay = $toDisplay . $Users[$i] . " Pending Request <br /><br />";
			}
			else
			{
				$toDisplay = $toDisplay . $Users[$i] . "<br /><br />";
			}
		}
		else
		{
			$toDisplay = $toDisplay . $Users[$i] . "<button class='mdl-button mdl-js-button mdl-button-- mdl-color--orange' type='submit' name = 'toAdd' value='". $UsersID[$i] ."'>AddFriend</button><br /><br />";

		}
	}

}
$db->close();
echo $toDisplay;
?>
