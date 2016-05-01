	<?php
	
	$myfile = fopen("./chat_logs/roomlog.txt", "a+");

	echo fread($myfile,filesize("./chat_logs/roomlog.txt"));

	fclose($myfile);

	/*
	$url1=$_SERVER['REQUEST_URI'];
	header("Refresh: 1; URL=$url1");
	*/
	?>
