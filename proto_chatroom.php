<html>
  <head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js">
	</script>

    <div id="chatBox" style="width:300px; height: 300px;background-color:black; color:white; padding:10px; overflow-y: scroll; overflow-x:hidden;  word-wrap: break-word;">
	
	<?php
	//Here you catch message as sent by the submit form
	$msg = $_POST['message'];
	//Formatting the message
	if($msg != "" && $msg != NULL){
		$formated_msg = "<p>".$msg."</p>";
		//Opening the log
		$myfile = fopen("roomlog.txt", "a+");
		//writing the message to the log
		fwrite($myfile, $formated_msg);
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
	<textarea name="message" rows="2" cols="40" id="textInput" form="myform" style="resize: none;overflow:auto;"></textarea>
	<br>
		<form action="proto_chatroom.php" method="POST" id="myform">
			<input type="submit">
		</form>
		
		<form action="ChatRemove.php">
			<input type="submit" value="Leave Chat">
		</form>
  </head>
</html>
