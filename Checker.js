function isValid()
{
	var name = document.getElementById("sample1").value;

	if(name == "")
	{
		alert("The nickname may not be blank");
		return false;
	}
	else
	{
		return true;
	}
}