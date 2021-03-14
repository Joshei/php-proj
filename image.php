
<?php
include('db.php');
session_start();
$session_id='1'; // User login session value
?>

<form id="imageform" method="post" enctype="multipart/form-data" action='ajaximage.php'>
Upload image <input type="file" name="photoimg" id="photoimg" />
</form>

<div id='preview'>
</div>
