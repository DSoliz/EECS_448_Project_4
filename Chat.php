<?php
session_save_path("./Sessions/");
session_start();

error_reporting(E_ALL);
ini_set("display_errors", 1);

$nickName = $_GET["nickname"];
$_SESSION["nextpage"] = $nickName;
$noOtherUser = true;

if($nickName == "")
{
	echo "User ID may not be blank";
}
else
{
	$mysqli = new mysqli("mysql.eecs.ku.edu", "mbechtel", "eecs448labPW", "mbechtel");
	if ($mysqli->connect_errno)
	{
    		printf("Connect failed: %s\n", $mysqli->connect_error);
    		exit();
	}

	$query = "INSERT INTO Chat (nickname) VALUES ('$nickName')";
	$query2 = "SELECT nickname FROM Chat";

	if($result = $mysqli->query($query2))
	{
		while ($row = $result->fetch_assoc())
		{
			if($nickName == $row["nickname"])
			{
				$noOtherUser = false;
			}
   		}

		$result->free();
	}

	if($noOtherUser)
	{
		if($result = $mysqli->query($query))
		{
		}
	}
	else
	{
		//echo "<script type='text/javascript'>alert('A person with that nickname is in the chat room');</script>";
	}

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