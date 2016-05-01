window.onpageshow = function(event) {
	if (event.persisted) {
		window.location.reload();
	}
};
//Set interval for frequency of content refresh and scroll
setInterval(function(){
		LoadLog();
		scroll(false);
		}, 250);
//Method To control autoscroll
function scroll(bottom){
		if($("#chatBox").scrollTop() >= $("#chatBox").prop("scrollHeight") -627 -100 || bottom){
				$("#chatBox").scrollTop($("#chatBox").prop("scrollHeight")); //autoscroll
		}
}
//This method sends a message that is to be stored into the log
function SendMessage(){
		$("#chatBox").scrollTop($("#chatBox").prop("scrollHeight"));
		//alert("scroll position" + $("#chatBox").scrollTop() + "scroll height " + $("#chatBox").prop("scrollHeight"));
		var text = $('textarea#textInput').val();
		//var text = document.getElementById("textinput").value;
		var ajaxFilename = "private_SendMessage.php";
		var data ={ message: text};
		var jqxhr = $.post(ajaxFilename, data);
		$('textarea#textInput').val("");
}
//This method loads the log and dumps it into the chatbox
function LoadLog(){
		var ajaxFilename = "private_chatContent.php";
				var data ={ friend_id: $('#friend_id').val()};
		var jqxhr = $.post(ajaxFilename, null, function(datafromserver){
				$('#chatBox').html(datafromserver);
		});
}
