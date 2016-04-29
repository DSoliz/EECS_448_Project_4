<html>
  <head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js">
	</script>

    <head>
    <link rel="stylesheet" type="text/css" href="ChatStyle.css">
    </head>

    <div id="chatBox"></div>

	<script>
	//scrolling to the bottom
	setInterval(function(){
		LoadLog();
		scroll();
		//$("#chatBox").load("chatContent.php");
		}, 250);
	function scroll(){
		if($("#chatBox").scrollTop() >= $("#chatBox").prop("scrollHeight") -627 -100){
			$("#chatBox").scrollTop($("#chatBox").prop("scrollHeight")); //autoscroll
		}
	}
	function SendMessage(){
		//alert("scroll position" + $("#chatBox").scrollTop() + "scroll height " + $("#chatBox").prop("scrollHeight"));
		var text = $('textarea#textInput').val();
		//var text = document.getElementById("textinput").value;
		var ajaxFilename = "SendMessage.php";
		var data ={ message: text};
		var jqxhr = $.post(ajaxFilename, data);
		$('textarea#textInput').val("");
	}
	function LoadLog(){
		var ajaxFilename = "chatContent.php";

		var jqxhr = $.post(ajaxFilename, null, function(datafromserver){
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
