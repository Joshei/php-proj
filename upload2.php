<?php

$productID = $_GET['pdib'];


$didItUpload = "false";
$string = "";
//https://stackoverflow.com/questions/23980733/jquery-ajax-file-upload-php
//https://www.w3schools.com/php/php_file_upload.asp

////////////////////////////////////
//WHEN  READY TO CHANGE: for unique filenams made by me.
//$target_file = "uploads1/screen1.png";
//if (move_uploaded_file($_FILES["file"]["tmp_name"], "uploads1/screen1.png")) {
///////////////////////////////////



//for new records, probably move
$record = "A";
function getAndSetLastID()
{
$host = 'localhost';
$user = 'root';
$pass = '';
$database = 'ecommerce';
$options = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_EMULATE_PREPARES => false
);
$dbo = new PDO("mysql:host=$host;dbname=$database", $user, $pass, $options);
$q1 = "SELECT lastImageNumber FROM lastimageid WHERE ProductID";
$conn->exec($sql);
$last_id = $conn->lastInsertId();

$last_id = $last_id  ;
    }


//check if image is in database

//if an image already in database get filename using pid and change the new image in directory to this filename
//2 changes :  file name and target_file

//if image not in database, get next filename and put into directory and database.


if (isset($_FILES['file'])) 
{
$file_name     = $_FILES["file"]["name"]; 
$target_dir = "uploads/";

$target_file = $target_dir . basename($_FILES["file"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image

  $check = getimagesize($_FILES["file"]["tmp_name"]);
  if($check !== false) {
    //$string .= "<br>File is an image - " . $check["mime"] . ".  <br>";
    $uploadOk = 1;
  } else {
    
    $string .= "File is not an image.\n";
    $uploadOk = 0;
  }


// Check if file already exists
if (file_exists($target_file)) {
    //$string .= "Sorry, file already exists.\n";
  $uploadOk = 1;
}

// Check file size
else if ($_FILES["file"]["size"] > 500000) {
    $string .= "Sorry, your file is too large.\n";
  $uploadOk = 0;
}

// Allow certain file formats
else if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    $string .="Sorry, only JPG, JPEG, PNG & GIF files are allowed.\n";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    $string .= "Your file was not uploaded.\n";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
    //$string .= "The file ". htmlspecialchars( basename( $_FILES["file"]["name"])). " has been uploaded.<br>";
    $didItUpload = "true";
    $filename = htmlspecialchars( basename( $_FILES["file"]["name"]));
  } else {
    $string .= "There was an error uploading your file.<br>";
    $didItUpload = "false";
  }
}
}




//$array['flag'] = '1';
//$array['string'] = $string;

echo ($string);
//return ($didItUpload);

//}
//save new filename in database
/*
function setsFilenameInDir()
{
$host = 'localhost';
$user = 'root';
$pass = '';
$database = 'ecommerce';
$options = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_EMULATE_PREPARES => false
);
$dbo3 = new PDO("mysql:host=$host;dbname=$database", $user, $pass, $options);
$q1 = "UPDATE products SET ProductFilename = $filename WHERE ProductID = $prodID ";
$count = $dbo3->exec($q1);
$result = mysql_query($q1);
}



function deleteFIle ()
{
$filename = "";
$prodID = $_GET['prodid'];
$host = 'localhost';
$user = 'root';
$pass = '';
$database = 'ecommerce';
$options = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_EMULATE_PREPARES => false
);
$dbo3 = new PDO("mysql:host=$host;dbname=$database", $user, $pass, $options);
$q1 = "SELECT ProductFilename FROM products WHERE ProductID = $prodID ";
$count = $dbo3->exec($q1);

$result = mysql_query($q1);
$row = mysql_fetch_row($result);
$oldFilename = "c://localhost/PHP Proj/uploads/$row[0]";
unlink($oldfilename);
}
*/


?>