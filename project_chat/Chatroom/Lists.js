//crowds the user list with a list of all users or users being searched
function search_User_List()
{
	var file = "UserList.php";
	var data = {inp: $('#usersearch').val()};
	var jqxhr = $.post(file,data,function(datafromserver)
	{
		$('#users').html(datafromserver);
	});
}

//crowds the user friend list with a list of his added friends
function friend_list()
{
	var file = "FriendList.php";
	var data = {inpfr: $('#friend_filter').val()};
	var jqxhr = $.post(file,data,function(datafromserver)
	{
		$('#userFriendList').html(datafromserver);
	});
}

//crowds requests form with users that have a pending friend request with the current user
function friend_requestor_list()
{
	var file = "Friend_Requestor_List.php";
	var data = {inp: 1};
	var jqxhr = $.post(file,data,function(datafromserver)
	{
		$('#friendRequests').html(datafromserver);
	});
}

//Calls the addFriend.php to add friend request to the friend relation table
function addFriend(toADDid)
{
	if(toADDid == "" || toADDid == null){return};
	var file = "addFriend.php";
	var data = {toAdd: toADDid};
	var jqxhr = $.post(file,data,function(datafromserver)
	{
		$('#notifications').html(datafromserver);
	});
	refresh_lists();
}

//Calls the Friend_Request_Update.php, 1 to accept request 0 to deny
function respond_request(req_id,response)
{
	var file = "Friend_Request_Update.php";
	var data = {requestor_id: req_id,accept: response};
	var jqxhr = $.post(file,data,function(datafromserver)
	{
		//here we tell the user if his action has bee fulfilled
		$('#notify_actions').html(datafromserver);
	});
	refresh_lists();
}

setInterval(function(){
		refresh_lists();
	}, 3000);

function refresh_lists(){
	search_User_List();
	friend_requestor_list();
	friend_list();
}

//Handling lists
search_User_List();
$(document).ready(function()
{
	refresh_lists();

	$('#usersearch').keyup(function(){
		search_User_List();
	});
});

//Handling accept and decline buttons
$(document).on("click", ":submit[name='accept']", function(e){
	respond_request($(this).data("requestor_id"),1);
});
$(document).on("click", ":submit[name='decline']", function(e){
	respond_request($(this).data("requestor_id"),0);
});

//Handling add Friend Button
$(document).on("click", ":submit[name='toAdd']", function(e){
	addFriend($(this).val());
});

//Handling unfriend button
$(document).on("click", ":submit[name='unFriend']", function(e){
	e.preventDefault();;
	respond_request($(this).val(),0);
});
