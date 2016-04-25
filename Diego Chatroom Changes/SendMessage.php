 <?php

	//This adds the message string to the textfile	

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
