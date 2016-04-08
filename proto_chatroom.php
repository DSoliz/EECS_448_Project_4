<html>
  <head>
    <script type="text/javascript"
			src="Post.js">
	</script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js">
	</script>

    <div style="width:300px; height: 300px;background-color:black; color:white; padding:10px; overflow-y: scroll; overflow-x:hidden;  word-wrap: break-word;">

    <p>Welcome</p>
	
	<?php

	$pass_value = $_POST['message'];
	$msg = $pass_value;
	$formated_msg = "<p>".$msg."</p>";
	
	$myfile = fopen("roomlog.txt", "a+");
	fwrite($myfile, $formated_msg);
	$myfile = fopen("roomlog.txt", "a+");
	
	echo fread($myfile,filesize("roomlog.txt"));

	fclose($myfile);
	
	/*
	$url1=$_SERVER['REQUEST_URI'];
	header("Refresh: 1; URL=$url1");
	*/
	?>

    </div>
	<script>
	$("div").scrollTop(100000000000);
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
  <body></body>
</html>
