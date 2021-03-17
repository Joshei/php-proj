<?php

//upload2.php?fileid= $fileID & displayid= $displayID & filename= $filename & pid= ProductID" 
$productID = $_GET['pdib'];
$filename = $_GET['filename'];
$fileid = $_GET['fileid'];
$displayID = $_GET['displayid'];
    

$didItUpload = "false";
$string = "";
//https://stackoverflow.com/questions/23980733/jquery-ajax-file-upload-php
//https://www.w3schools.com/php/php_file_upload.asp
$noFileSelected = "true";
$image = "";
$filename = ""; 

function getFilename($productID, $filename)
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

//$sql = "SELECT ProductImage, ProductFilename FROM products WHERE ProductID = $productID";
$stmt = $dbo1->prepare("SELECT ProductImage, ProductFilename FROM products WHERE ProductID = ?");
$stmt->execute([$productID]);

//foreach($dbo->query($sql) as $row1)
while ($row1 = $stmt->fetch()) 
{


 $filename = $row1['ProductFilename'];
}
 return($filename);
}




$filename = getFilename($productID, $filename);

$host = 'localhost';
$user = 'root';
$pass = '';
$database = 'ecommerce';
$options = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_EMULATE_PREPARES => false
);
$dbo = new PDO("mysql:host=$host;dbname=$database", $user, $pass, $options);

$imageFileType = "";


if (isset($_FILES['file'])) 
{

if ($filename != null)
{
  
$file_name = $filename;
$savename = "uploads/" . $filename; 
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


  /*if($imageFileType == "jpg" )
  {
    $savename .= ".jpg";
  }
  else if ($imageFileType == "png" )
  {
    $savename .= ".png";
  }
  else if ($imageFileType == "jpeg")
  {
    $savename.= ".jpeg";
  }
  else if ($imageFileType == "gif" )
  {
    $savename .= ".gif";
  } 
*/

  //if (move_uploaded_file($_FILES["file"]["tmp_name"], $file_name)) {
  if (move_uploaded_file($_FILES["file"]["tmp_name"], $savename)){ 
  
    $string .= "The file ". htmlspecialchars( basename( $_FILES["file"]["name"])). " has been uploaded.<br>";
    $didItUpload = "true";
    
    $noFileSelected = "false";
    
    $filename = htmlspecialchars( basename( $_FILES["file"]["name"]));
  } else {
    $string .= "There was an error uploading your file.<br>";
    $didItUpload = "false";
    $noFileSelected = "true";

    echo $string;

  }
  //is already an image in erecord save dnew image as same record name


  
}
}//is a filenAME

 
} //if is a file is in there
  
else 
{

if (isset($_FILES['file'])) 
{
  
$number = 0;
$q1 = "SELECT Number FROM  numbers";
foreach ($dbo->query($q1) as $row) {

    $number = $row['Number'];
}
//number is used to create filename
$otherNumber = $number + 1;
$newFilename = "A" . $otherNumber;

$target_dir = "uploads/";

$target_file = $target_dir . basename($_FILES["file"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if($imageFileType == "jpg" )
{
  $newFilename .= ".jpg";
}
else if ($imageFileType == "png" )
{
  $newFilename .= ".png";
}
else if ($imageFileType == "jpeg")
{
  $newFilename .= ".jpeg";
}
else if ($imageFileType == "gif" )
{
  $newFilename .= ".gif";
} 

$file_name     = $newFilename; 
$savefilename = "uploads/" . $file_name; 

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
  //if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
  if (move_uploaded_file($_FILES["file"]["tmp_name"], $savefilename)) {
    //$string .= "The file ". htmlspecialchars( basename( $_FILES["file"]["name"])). " has been uploaded.<br>";
    $didItUpload = "true";
    $filename = htmlspecialchars( basename( $_FILES["file"]["name"]));
  } else {
    $string .= "There was an error uploading your file.<br>";
    $didItUpload = "false";
  }
}
}//end is a file

if($didItUpload == "true")
{

  //set new number back in database
//$q2 = "UPDATE numbers SET Number = " . $otherNumber;
$stmt = $pdo->prepare( "UPDATE numbers SET Number =  ? ");
$stmt->execute($otherNumber);

//put newFilename in database

//////////




//puts new filename into database




//$q3 = "UPDATE products SET  ProductFilename = '$newFilename' WHERE ProductID = $productID";
$stmt = $pdo->prepare("UPDATE products SET  ProductFilename = '$newFilename' WHERE ProductID = ?");
$stmt->execute([$productID]);
//$dbo->exec($q3);



}//did upload

//no file was selected
 
  //echo ($string);

}


//is a file
//all work for image is done, ready for savenewrecord, either way






/////////////

//check if image is in database

//if an image already in database get filename using pid and change the new image in directory to this filename
//2 changes :  file name and target_file

//if image not in database, get next filename and put into directory and database.



/*
$host = 'localhost';
$user = 'root';
$pass = '';
$database = 'ecommerce';
$options = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_EMULATE_PREPARES => false
);
$dbo1 = new PDO("mysql:host=$host;dbname=$database", $user, $pass, $options);

//for a new record
$q1 = "SELECT Number FROM  number";
foreach ($dbo->query($q1) as $row) {

    $number = $row['number'];
    $otherNumber = $number + 1;
}
//number is used to create filename
$q1 = "UPDATE number SET Number = " . $otherNumber;
$dbo1->exec($q1);
*/








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

if (!isset($myObj) && isset($string))
{
$myObj = new stdClass();
$myObj->htmlstuff = $string;


//Encode the data as a JSON string
$jsonStr = json_encode($myObj);
echo $jsonStr;


}
?>