<?php

session_start();
$session_id='1'; // User login session value
?>

<html>

<head>
<script type="text/javascript" src="http://ajax.googleapis.com/
ajax/libs/jquery/1.5/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js" integrity="sha384-qlmct0AOBiA2VPZkMY3+2WqkHtIQ9lSdAsAn5RUJD/3vA5MKDgSGcdmIv4ycVxyn" crossorigin="anonymous"></script>

</head>

<body>

<script type="text/javascript">

$(document).ready(function()
{
$('#photoimg').live('change', function()
{
$("#preview").html('');
$("#preview").html('<img src="loader.gif" alt="Uploading...."/>');
$("#imageform").ajaxForm(
{
target: '#preview'
}).submit();
});
});
</script>



<form id="imageform" method="post" enctype="multipart/form-data" >
Upload image <input type="file" name="photoimg" id="photoimg" />
<button type = "submit" >Save Image</button>
</form>

<div id='preview'>
</div>


</body>
</html>