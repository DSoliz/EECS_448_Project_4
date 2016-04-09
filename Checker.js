/**
 * @author Michael Bechtel
 * @version 1.0
 */
 
/**
 * Determines if the nickname chosen by the user is valid
 * 
 * @param {pre} The user has submitted the HTML form from Chat.html
 * @param {post} The user will enter the pre chat room if valid or be prompted to input a different nickname
 * @return {bool} If the user given nickname is valid
 */
function isValid()
{
	//Get the input from the form
	var name = document.getElementById("sample1").value;

	//If the user input was blank
	if(name == "")
	{
		//Tell the user that the input was invalid
		alert("The nickname may not be blank");
		
		//Keep the form from submitting and have input a nickname
		return false;
	}
	else
	{
		//Submit the form to Chat.php and send user to the pre chat room
		return true;
	}
}