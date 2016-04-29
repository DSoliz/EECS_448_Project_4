<html>
  <head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"> </script>
	
    <link href="ChatStyle.css"
	      rel="stylesheet"
	      type="text/css"/> 

    <div id="chatBox">
	
	<?php
	session_save_path("./Sessions/");
	session_start();
	
	//Here you catch message as sent by the submit form
	$msg = $_POST['message'];

	$msg = htmlspecialchars($msg);
	
	//Formatting the message
	if($msg != "" && $msg != NULL && $_SESSION["nextpage"] != ""){
		$formated_msg = "<p>".$_SESSION["nextpage"].": ".$msg."</p>";
		//Opening the log
		$myfile = fopen("roomlog.txt", "a+");
		//writing the message to the log
		fwrite($myfile, $formated_msg);
	}
	else if ($_SESSION["nextpage"] == "")
	{
            header("Location: http://people.eecs.ku.edu/~mbechtel/448/Project3/Chat.html");
            exit();
	}
	//Opening file again and displaying its contents
	$myfile = fopen("roomlog.txt", "a+");
	echo fread($myfile,filesize("roomlog.txt"));
	fclose($myfile);
	?>

    </div>
	
	<script>
	//scrolling to the bottom
		$("div").scrollTop(100000000000);
		setInterval(function(){ 
			$("#chatBox").load("chatContent.php");
			}, 250);
	</script>
	
	<br>
	<textarea name="message" rows="2" cols="40" id="textInput" form="myform" onkeydown></textarea>
	<br> <br> <br> <br> <br>
			
	
	<form action="proto_chatroom.php" method="POST" id="myform" name="textPost">
		<input type="submit" value="Post message">
	</form> <br> <br> <br>
	
	<form action="Chat.php">
                <input type"submit" value="Return to Pre-Chat">
        </form>
		
	<form action="ChatRemove.php">
		<input type="submit" value="Leave Chat">
	</form>
  </head>
</html>
