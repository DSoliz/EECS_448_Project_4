function searchForUser()
{
	var file = "UserList.php";
	var data = {inp: $('#usersearch').val()};
	var jqxhr = $.post(file,data,function(datafromserver)
	{
		$('#userson').html(datafromserver);
	});
}

$(document).ready(function()
{
	$('#usersearch').keyup(function()
	{
		searchForUser();
	});
});