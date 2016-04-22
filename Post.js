function postMessage()
{      
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
        document.getElementById("test").innerHTML += "<br>" + document.getElementById("textInput").value;
        }
    };
    xhttp.open("GET", "testlog.txt", true);
    xhttp.send();
}
