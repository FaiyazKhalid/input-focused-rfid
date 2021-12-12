<!DOCTYPE html>
<html>
<head>
	<title>RDIF READER INPUT</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

//Below code for onbody focus while there is no need of theses codes

<body onload="focusOnInput()">
<div style="margin: auto;width: 60%;">
	<div class="alert alert-success alert-dismissible" id="success" style="display:none;">
	  <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
</div>

//Below code for iput submit to database using ajax

<script>
function focusOnInput() {
    document.forms["form"]["name"].focus();
}
function ajax_submit()
{
    $.ajax({
        url: "save.php",
        type: "POST",
        data: {
            name: $("#name").val()
        },
        dataType: "JSON",
        success: function (jsonStr) {
        document.getElementById("form").reset();    
            // another codes when result is success
        }
    });
}
</script>

//Show result of input from database using ajax

<script>
    $(document).ready(function(){
        setInterval(function(){
            $("#count").load('view.php')
        }, 2000);
    });
</script>

//Result of Input updated to database

<center><h1><div id="count"  class="c"></div></h1> <br>

//Input form

<form id="form" action="POST" onfocus="this.value=''" onsubmit="ajax_submit();return false;" autofocus>
    <b></b></b> <input type="text" class="my-input" height="1024%" width="1024%" name="name" id="name" autofocus>
    <br>
    <input type="submit" hidden name="send" onclick="ajax_submit();">
</form> </center>

//Below code is the most important code for direct focused on input box to get rfid id data.

<script>
    document.addEventListener("keypress", function(e) {
  if (e.target.tagName !== "INPUT") {
    var input = document.querySelector(".my-input");
    input.focus();
    input.value = e.key;
    e.preventDefault();
  }
});
</script>

