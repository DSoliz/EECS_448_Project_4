<!DOCTYPE html>

<html>
<head><title>Chat client</title>
	<!--Script to have Modal Pop-up windows gotten from http://www.codeproject.com/Articles/589445/JavaScript-Modal-Popup-Window -->
	<script src="JavaScript/ModalPopupWindow.js" type="text/javascript"></script>
	<link type="text/css" rel="stylesheet" href="css/style.css" />
</head>
<body>

	<!-- box that displays chat -->
	<div id="chat"><?php if(file_exists("log.html") && filesize("log.html") > 0)
	{
    $handle = fopen("log.html", "r");
    $contents = fread($handle, filesize("log.html"));
    fclose($handle);

    echo $contents;
	}
	?></div>

	<!-- form that handles user input -->
	<form name = "msg" method="POST" onSubmit="submitMessage.php">
		<input name = "inputMsg" type = "textbox" id="inputMsg">
		<input name = "submitMsg" type = "submit" id="submitMsg">
	</form>

</body>
</html>
