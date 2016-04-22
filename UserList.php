<?php
date_default_timezone_set('America/Chicago');

error_reporting(E_ALL);
ini_set("display_errors", 1);

$Users = array();

$mysqli = new mysqli("mysql.eecs.ku.edu", "mbechtel", "eecs448labPW", "mbechtel");
if ($mysqli->connect_errno)
{
		printf("Connect failed: %s\n", $mysqli->connect_error);
		exit();
}

$query = "SELECT nickname FROM Chat";

if($result = $mysqli->query($query))
{
	while($row = $result->fetch_assoc())
	{
		array_push($Users, $row["nickname"]);
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

$mysqli->close();

echo $usersOn;
?>