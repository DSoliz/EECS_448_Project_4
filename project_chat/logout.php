<?php
	include("session.php");
	if(session_destroy()) {
		$offline = "DELETE FROM Online WHERE (id = $id)";
		$db->query($offline);
		unset($_SESSION['login_user']);
		header("location: login.php");
	}
?>
