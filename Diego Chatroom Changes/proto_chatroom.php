<html>
  <head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js">
	</script>

    <head>
    <link rel="stylesheet" type="text/css" href="ChatStyle.css">
    </head>

    <div id="chatBox"></div>

	<script>
	//the refresh content loop
	setInterval(function(){
		LoadLog();
		scroll();
		}, 250);

	//Scroll method to auto scroll to bottom of chat log
	function scroll(){
		if($("#chatBox").scrollTop() >= $("#chatBox").prop("scrollHeight") -627 -100){
			$("#chatBox").scrollTop($("#chatBox").prop("scrollHeight")); //autoscroll
		}
	}
	//Send Message method
	function SendMessage(){
		//alert("scroll position" + $("#chatBox").scrollTop() + "scroll height " + $("#chatBox").prop("scrollHeight"));
		var text = $('textarea#textInput').val();
		//The php portion that sent messages has been moved to SendMessage.php
		var ajaxFilename = "SendMessage.php";
		var data ={ message: text};
		var jqxhr = $.post(ajaxFilename, data);
		$('textarea#textInput').val("");
	}
	//This method loads the log
	function LoadLog(){
		var ajaxFilename = "chatContent.php";

		var jqxhr = $.post(ajaxFilename, null, function(datafromserver){
			//the chatContent.php echoes to datafromserver variable and then all text is loaded in to the chatbox
			$('#chatBox').html(datafromserver);
		});
	}
	</script>


	<br>
	<textarea name="message" id="textInput" form="myform" ></textarea>
		<form action="javascript:SendMessage()" id="myform">
			<input type="submit" value="Send">
		</form>
  </head>
</html>
