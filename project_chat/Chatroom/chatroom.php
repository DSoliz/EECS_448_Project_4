<?php
	include("../session.php");
?>
<script>
	//Forcing reload so user content is not save on cache, some browsers load
	//their copy of the page when hitting the back button
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
			var ajaxFilename = "SendMessage.php";
			var data ={ message: text};
			var jqxhr = $.post(ajaxFilename, data);
			$('textarea#textInput').val("");
	}
	//This method loads the log and dumps it into the chatbox
	function LoadLog(){
			var ajaxFilename = "chatContent.php";

			var jqxhr = $.post(ajaxFilename, null, function(datafromserver){
					$('#chatBox').html(datafromserver);
			});
	}

	//This makes the hit enter send message magic
	$("#textInput").keyup(function(event){
	    if(event.keyCode == 13){
	        $("#myform").submit();
	    }
	});

</script>

<html>
	<head>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"> </script>
		<link href="ChatStyle.css" rel="stylesheet" type="text/css"/>
	</head>
	<body>

		<div id="chatBox" align="left"></div>

		<br>
		<textarea
		onkeydown="if (event.keyCode == 13) { this.form.submit(); return false; }"
		name="message" rows="2" cols="40" id="textInput" form="myform"></textarea>
		<br> <br> <br> <br> <br>

		<form action="javascript:SendMessage()" method="POST" id="myform" name="textPost">
			<input type="submit" value="Post message">
		</form> <br> <br> <br>

		<form action="Chat.php">
			<input type="submit" value="Return to Pre-Chat">
		</form> <br> <br> <br>

		<form action="../logout.php">
			<input type="submit" value="Leave Chat">
		</form>
	</body>
</html>
