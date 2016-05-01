<?php
include("../session.php");

$request_arr = array(); //Friends by id
$u_friend_str = array(); //Friend array by name

$action = $_POST['accept']; //Where this is either 1 = accept 0 = decline

$requestor_id = $_POST['requestor_id']; //Id of the person whose request will be accpted/declined

//status 0 for pending request, 1  for friend, 2 for denied?

if($action == 1){
	//accept request and change the two tables rows fr1_fr2 and fr_2_fr1 status to 1 to confirm mutal
	$requestUpdate = "UPDATE Friends SET status = '1' WHERE (friend_one = $requestor_id and friend_two = $id)";
	echo "Friend Added";

	//Uncomment to have query work
	$db->query($requestUpdate);
}else{
	$requestUpdate = "DELETE FROM Friends WHERE (friend_one = $requestor_id and friend_two = $id) or (friend_one = $id and friend_two = $requestor_id)";
	echo "Friend Added";

	//Uncomment to have query work
	$db->query($requestUpdate);
}
$db->close();
?>
