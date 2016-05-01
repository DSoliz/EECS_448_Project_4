<?php
include("../session.php");
$friend_id = $_SESSION['friend_id'];


$poss_filename_1 = "./chat_logs/chatlog_" . $id ."_" . $friend_id . ".txt";
$poss_filename_2 = "./chat_logs/chatlog_" . $friend_id ."_" . $id . ".txt";

if (file_exists($poss_filename_1)){

	$myfile = fopen($poss_filename_1, "a+");
	echo fread($myfile,filesize($poss_filename_1));
}else if (file_exists($poss_filename_2)){

	$myfile = fopen($poss_filename_2, "a+");
	echo fread($myfile,filesize($poss_filename_2));
}else{

	$myfile = fopen($poss_filename_1, "x+");
	fwrite($myfile,"<br>");
	echo fread($myfile,filesize($poss_filename_1));
}

fclose($myfile);

/*
$url1=$_SERVER['REQUEST_URI'];
header("Refresh: 1; URL=$url1");
*/
?>
