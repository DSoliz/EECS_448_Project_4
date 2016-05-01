<?php
include("../session.php");
$friend_id = $_SESSION['friend_id'];

//Here you catch message as sent by the submit form
$msg = $_POST['message'];
$msg = htmlspecialchars($msg);

$poss_filename_1 = "./chat_logs/chatlog_" . $id ."_" . $friend_id . ".txt";
$poss_filename_2 = "./chat_logs/chatlog_" . $friend_id ."_" . $id . ".txt";
$actual_filename = "";

//Formatting the message
if($msg != "" && $msg != NULL && $_SESSION['login_user'] != ""){
	if (file_exists($poss_filename_1)){
		$actual_filename = $poss_filename_1;
	}else if (file_exists($poss_filename_2)){
		$actual_filename = $poss_filename_2;
	}

	$formated_msg = "<p>".$_SESSION['login_user'].": ".$msg."</p>";
	//Opening the log
	$myfile = fopen($actual_filename, "a+");
	//writing the message to the log
	fwrite($myfile, $formated_msg);
}
else if ($_SESSION['login_user'] == "")
{
	header("Location: Chat.html");
	exit();
}
//Opening file again and displaying its contents
$myfile = fopen("roomlog.txt", "a+");
echo fread($myfile,filesize("roomlog.txt"));
fclose($myfile);
?>
