 <?php
        session_save_path("./Sessions/");
        session_start();
?>

<html>
  <head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"> </script>
	
    <link href="ChatStyle.css"
	      rel="stylesheet"
	      type="text/css"/> 

    <div id="chatBox">
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
    </div>
	
	<br>
	<textarea name="message" rows="2" cols="40" id="textInput" form="myform" onkeydown></textarea>
	<br> <br> <br> <br> <br>
			
	
	<form action="javascript:SendMessage()" method="POST" id="myform" name="textPost">
		<input type="submit" value="Post message">
	</form> <br> <br> <br>
	
	<form action="Chat.php">
                <input type="submit" value="Return to Pre-Chat">
        </form> <br> <br> <br>
		
	<form action="ChatRemove.php">
		<input type="submit" value="Leave Chat">
	</form>
  </head>
</html>
