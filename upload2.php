

<?php
session_start();


//for edits not insert
//get old filename and delete file
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




$string = "";
//https://www.w3schools.com/php/php_file_upload.asp

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image

  $check = getimagesize($_FILES["file"]["tmp_name"]);
  if($check !== false) {
    $string .= "<br>File is an image - " . $check["mime"] . ".  <br>";
    $uploadOk = 1;
  } else {
    
    $string .= "<br>File is not an image.<br>";
    $uploadOk = 0;
  }


// Check if file already exists
if (file_exists($target_file)) {
    $string .= "Sorry, file already exists.<br>";
  $uploadOk = 0;
}

// Check file size
else if ($_FILES["file"]["size"] > 500000) {
    $string .= "Sorry, your file is too large.<br>";
  $uploadOk = 0;
}

// Allow certain file formats
else if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    $string .="Sorry, only JPG, JPEG, PNG & GIF files are allowed.<br>";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    $string .= "Your file was not uploaded.<br>";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
    $string .= "The file ". htmlspecialchars( basename( $_FILES["file"]["name"])). " has been uploaded.<br>";
    $filename = htmlspecialchars( basename( $_FILES["file"]["name"]));
  } else {
    $string .= "There was an error uploading your file.<br>";
  }
}

//save new filename in database

$q1 = "UPDATE products SET ProductFilename = $filename WHERE ProductID = $prodID ";
$count = $dbo3->exec($q1);
$result = mysql_query($q1);


echo $string;


?>