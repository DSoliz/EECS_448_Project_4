<?php
include("../session.php");

function getFriends($status){

	global $db, $id;

	$friends_by_id = array(); //Friends by id
	$u_friend_str = array(); //Friend array by name
	//BTW status has to be in the '0' '1' '2' format else, is will default to 0 on the query
	$query = "SELECT friend_one,friend_two FROM Friends where ((friend_one = '$id' or friend_two = '$id') and status = '$status')";
	if($result = $db->query($query)){
		while($row_friend = $result->fetch_assoc()){
			if($row_friend['friend_one'] == $id){
				array_push($friends_by_id, $row_friend['friend_two']); //This will be pushing friend id's into $friends_by_id
			}else{
				array_push($friends_by_id, $row_friend['friend_one']);
			}
		}
		$result->free();
	}

	return array($friends_by_id , $u_friend_str) ;
}
?>
