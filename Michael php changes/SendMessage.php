 <?php
        include("proto_chatroom.php");
        session_save_path("./Sessions/");
        session_start();

        
	//This adds the message string to the textfile	

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
