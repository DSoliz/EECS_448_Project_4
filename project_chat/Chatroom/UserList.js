function searchForUser()
{
	var file = "UserList.php";
	var data = {inp: $('#usersearch').val()};
	var jqxhr = $.post(file,data,function(datafromserver)
	{
		$('#userson').html(datafromserver);
	});
}

function userFriend()
{
	var file = "FriendList.php";
	var data = {inpfr: $('#friend_filter').val()};
	var jqxhr = $.post(file,data,function(datafromserver)
	{
		$('#userFriendList').html(datafromserver);
	});
}


$(document).ready(function()
{
	userFriend();
	/*
	$('#friend_filter').keyup(function(){
		userFriend();
	});
	*/
	$('#usersearch').keyup(function(){
		searchForUser();
	});
});
