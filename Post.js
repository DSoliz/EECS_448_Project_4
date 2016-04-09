/**
 * @author Michael Bechtel
 * @version 1.0
 */

/** 
 * @param {pre} The user has submitted the Post Message form from proto_chatroom.php
 * @param {post} The user's post will be written to the end of the current message board
 * @return {Null} None
 */
function postMessage()
{      
	//Create an XMLHttpRequest object
    var xhttp = new XMLHttpRequest();
	
	//Determine if the ready state has changed
    xhttp.onreadystatechange = function() {
		//If the state has changed
        if (xhttp.readyState == 4 && xhttp.status == 200) 
		{
			//Add the user's post to the message board
			document.getElementById("test").innerHTML += "<br>" + document.getElementById("textInput").value;
        }
    };
	
	//Open the testlog.txt file
    xhttp.open("GET", "testlog.txt", true);
	//Send the request
    xhttp.send();
}
