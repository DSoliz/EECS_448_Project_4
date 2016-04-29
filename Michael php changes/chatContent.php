	<?php

	$myfile = fopen("roomlog.txt", "a+");
	
	echo fread($myfile,filesize("roomlog.txt"));

	fclose($myfile);
	
	/*
	$url1=$_SERVER['REQUEST_URI'];
	header("Refresh: 1; URL=$url1");
	*/
	?>