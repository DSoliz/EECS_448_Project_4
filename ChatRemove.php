<?php
/**
 * @author Michael Bechtel
 */

//Start the session to get the user's nickname
session_save_path("./Sessions/");
session_start();

//Create a mysqli object and connect it to the database
$mysqli = new mysqli("mysql.eecs.ku.edu", "mbechtel", "eecs448labPW", "mbechtel");
if ($mysqli->connect_errno)
{
 	printf("Connect failed: %s\n", $mysqli->connect_error);
   	exit();
}

//Set up the query that the mysqli object will run
$query = "DELETE FROM Chat WHERE nickname='".$_SESSION["nextpage"]."'";

//Run the first query
if($result = $mysqli->query($query))
{
}

//Close the mysql object
$mysqli->close();
?>

<html>
	<head>
	</head>

	<body>
		<p> Thanks for chatting </p>	

		<a href="http://people.eecs.ku.edu/~mbechtel/448/Project3/Chat.html"> Return to login </a>		
	</body>
</html>