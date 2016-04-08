<?php
session_save_path("http://people.eecs.ku.edu/~mbechtel/448/Project3/Sessions");
session_start();

$mysqli = new mysqli("mysql.eecs.ku.edu", "mbechtel", "eecs448labPW", "mbechtel");
if ($mysqli->connect_errno)
{
 	printf("Connect failed: %s\n", $mysqli->connect_error);
   	exit();
}

$query = "DELETE FROM Chat WHERE nickname='".$_SESSION["nextpage"]."'";

if($result = $mysqli->query($query))
{
}

$mysqli->close();
?>

<html>
	<head>
	</head>

	<body>
		<p> Thanks for chatting </p>			
	</body>
</html>