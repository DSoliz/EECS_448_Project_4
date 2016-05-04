<?php
include("../session.php");
//Use JQuery to call this .php

//This outputs html code containing a list of users that send a request to the current User
//and also buttons to accept or decline request.

//this return array of users that have sent a request to the current user
$query_requests = "SELECT UserName, id FROM Users WHERE id IN (SELECT friend_one FROM Friends where friend_two = '$id' and status = '0')";

$requestor_UsrName = array(); //array holding the name of the requestors
$requestor_id = array(); //array hoding the id of the requestors

if($result = $db->query($query_requests)){
	while($row_request = $result->fetch_assoc()){
		array_push($requestor_UsrName, $row_request['UserName']);
		array_push($requestor_id, $row_request['id']);
	}
	$result->free();
}

//Formating output string
$toDisplay = ""; //Html formated string with buttons to accept or decline the rquest

for($i = 0; $i < sizeof($requestor_id); $i++){
	$accept_button = "<button class='mdl-button mdl-js-button mdl-button-- mdl-color--orange' type='submit' name = 'accept' data-requestor_id = '" . $requestor_id[$i] ."' value='1'>Accept</button>";
	$decline_button = "<button class='mdl-button mdl-js-button mdl-button-- mdl-color--orange' type='submit' name = 'decline' data-requestor_id = '" . $requestor_id[$i] ."' value='0'>Decline</button>";
	$toDisplay = $toDisplay . $requestor_UsrName[$i] . $accept_button . $decline_button ."<br/>";
}
$db->close();
echo $toDisplay;
?>
