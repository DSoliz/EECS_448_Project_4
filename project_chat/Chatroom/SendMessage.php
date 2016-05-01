 <?php
include("../successlog.php");
session_start();


//This adds the message string to the textfile

//Here you catch message as sent by the submit form
$msg = $_POST['message'];
$msg = htmlspecialchars($msg);

//Formatting the message
if($msg != "" && $msg != NULL && $_SESSION['login_user'] != ""){
	$formated_msg = "<p>".$_SESSION['login_user'].": ".$msg."</p>";
	//Opening the log
	$myfile = fopen("./chat_logs/roomlog.txt", "a+");
	//writing the message to the log
	fwrite($myfile, $formated_msg);
}
else if ($_SESSION['login_user'] == "")
	{
		header("Location: Chat.php");
		exit();
	}
//Opening file again and displaying its contents
$myfile = fopen("roomlog.txt", "a+");
echo fread($myfile,filesize("./chat_logs/roomlog.txt"));
fclose($myfile);
?>
