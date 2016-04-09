<?php

/**
 * @author Michael Bechtel, Diego Soliz, Connor Welch, Dustin Wendt
 */

//Start a session that will save the user's nickname
session_save_path("./Sessions/");
session_start();

//Display any code errors on screen
error_reporting(E_ALL);
ini_set("display_errors", 1);

//Get the user's nickname
$nickName = $_GET["nickname"];

//Store the nickname as a session variable
$_SESSION["nextpage"] = $nickName;

//Initialize variable that will be used to see if the current nickname is already taken
$noOtherUser = true;

//If the nickname is blank
if($nickName == "")
{
	//Print out that the nickname can't be blank
	echo "User ID may not be blank";
}
else
{
	//Connect to the mysql database
	$mysqli = new mysqli("mysql.eecs.ku.edu", "mbechtel", "eecs448labPW", "mbechtel");
	if ($mysqli->connect_errno)
	{
    		printf("Connect failed: %s\n", $mysqli->connect_error);
    		exit();
	}

	//Set the queries that will by done by the mysqli object
	$query = "INSERT INTO Chat (nickname) VALUES ('$nickName')";
	$query2 = "SELECT nickname FROM Chat";

	//If the second query runs
	if($result = $mysqli->query($query2))
	{
		while ($row = $result->fetch_assoc())
		{
			//If the nickname is already in the database
			if($nickName == $row["nickname"])
			{
				//Set variable to false to show that the name is already taken
				$noOtherUser = false;
			}
   		}
		
		//Free the result
		$result->free();
	}

	//If the nickname isn't taken
	if($noOtherUser)
	{
		//Run the first query
		if($result = $mysqli->query($query))
		{
		}
	}

	//Close the mysqli object
	$mysqli->close();
}
?>

<html>
	<head>
		<script type="text/javascript"
			src="Post.js">
		</script>
	</head>

	<body>	
		<div style="width:300px; height: 300px;background-color:black; color:white; padding:10px; overflow-y: scroll;" id="test"> Welcome to the Pre Chat Room </div>		

		<form action="proto_chatroom.php" method="POST" id="form">
			<input type="submit" value="Enter Chat">
		</form>
	</body>
</html>