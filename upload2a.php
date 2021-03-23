<?php
session_start();
$_SESSION['savedfilename'] = "";
echo '<pre>' . print_r($_POST, 1) . '</pre>';
$productID = $_POST['productID'];
$filename = $_POST['filename'];
//$fileid = $_GET['fileid'];
//$displayID = $_GET['displayid'];

//$_SESSION['try'] = 0;


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
$stmt = $dbo->prepare("SELECT ProductImage, ProductFilename FROM products WHERE ProductID = ?");
$stmt->bindParam(1, $productID);
$stmt->execute();



//foreach($dbo->query($sql) as $row1)
while ($row1 = $stmt->fetch()) 
{


 $filename = $row1['ProductFilename'];
}
 return($filename);
}




$filename = getFilename($productID, $filename);

$imageFileType = "";


if (isset($_FILES['file'])) 
{

if ($filename != null)
{

//////////////

$number = 0;
$q1 = "SELECT Number FROM  numbers";

foreach ($dbo->query($q1) as $row) {

    $number = $row['Number'];
}



//number is used to create filename

$otherNumber1 = $number;
$otherNumber = $number + 1;
$newFilename = "A" . $otherNumber;
$deleteOldFilename = "A" . $otherNumber1;


$target_dir = "uploads/";

$target_file = $target_dir . basename($_FILES["file"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if($imageFileType == "jpg" )
{
  $ext = ".jpg";
  $newFilename .= ".jpg";
}
else if ($imageFileType == "png" )
{
  $ext = ".png";
  $newFilename .= ".png";
}
else if ($imageFileType == "jpeg")
{
  $ext = ".jpeg";
  $newFilename .= ".jpeg";
}
else if ($imageFileType == "gif" )
{
  $ext = ".gif";
  $newFilename .= ".gif";
} 

//////////////
$filename1 = $deleteOldFilename . $ext;


unlink("uploads/$filename1");



$file_name     = $newFilename; 
$savedfilename = "uploads/" . $file_name; 

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


  //if (move_uploaded_file($_FILES["file"]["tmp_name"], $file_name)) {
  if (move_uploaded_file($_FILES["file"]["tmp_name"], $savedfilename)){ 
  
    $_SESSION['savedfilename'] = $savedfilename;

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

//////////
if($didItUpload == "true")
{

  //set new number back in database
//$q2 = "UPDATE numbers SET Number = " . $otherNumber;
$stmt = $dbo->prepare( "UPDATE numbers SET Number =  ? ");

$stmt->bindParam(1, $otherNumber);
$stmt->execute();


//$q3 = "UPDATE products SET  ProductFilename = '$newFilename' WHERE ProductID = $productID";
$stmt = $dbo->prepare("UPDATE products SET  ProductFilename = '$newFilename' WHERE ProductID = ?");

$stmt->bindParam(1, $productID);
$stmt->execute();

}//
////////

}

}
}//is a filenAME

 
//} //if is a file is in there
?>