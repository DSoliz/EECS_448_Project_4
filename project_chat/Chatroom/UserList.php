<?php
//TO DO
//This should allow to search all users and allow to send friend request
//It should also display online USERS for testing puroposees and checking if everything is working fine.

include("../session.php");
date_default_timezone_set('America/Chicago');

error_reporting(E_ALL);
ini_set("display_errors", 1);

$Users = array();

$query = "SELECT username FROM Online";
//NEED
//Need to instert username to Online database upon loading Chat.php or login.
//Logout removes user from the base
//If the user hasn't been active for a time expire his session and remove from the online base

if($result = $db->query($query)){
	while($row = $result->fetch_assoc()){
		array_push($Users, $row['username']);
	}
	$result->free();
}

if(!isset($_POST['inp']))
{
	return;
}

$searchTerm = $_POST['inp'];
$usersOn = "";

for($i = 0; $i < sizeof($Users); $i++)
{
	if(strlen(trim($searchTerm)) == 0)
	{
		$usersOn = $usersOn . $Users[$i] . " <br />";
	}
	else
	{
		$contains = strpos($Users[$i], $searchTerm);
		if($contains !== false)
		{
			$usersOn = $usersOn . $Users[$i] . " <br />";
		}
	}
}

$db->close();

echo $usersOn;
?>
