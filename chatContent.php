	<?php
	/**
	 * @author Diego Soliz
	 */

	 //Open the message board log and set it to append
	$myfile = fopen("roomlog.txt", "a+");
	
	//Read from the current file
	echo fread($myfile,filesize("roomlog.txt"));

	//Close the file
	fclose($myfile);
	
	/*
	$url1=$_SERVER['REQUEST_URI'];
	header("Refresh: 1; URL=$url1");
	*/
	?>