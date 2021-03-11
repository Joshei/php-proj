<?php
require("upload2.php"); 


//if this has value than  file buttton has been pressed
$file = $_GET['filename'];
//$var7 = $_GET['val7'];//key id
$var1 = $_GET['val1'];//ProductTitle
$var2 = $_GET['val2'];//ProductDescription
$var3 = $_GET['val3'];//ProductCost
$var4 = $_GET['val4'];//ProductQuantity
$var8  = $_GET['val8'];//key1
$var9 = $_GET['val9'];//key2
$var10 = $_GET['val10'];//key3
$var5 = $_GET['val5'];//ProductID
//dropdown selected text
$var13 = $_GET['val13'];
//$file = $_GET['filename'];
$var14 = $_GET['val11'];



//if here image has been taken care of. move these functions to upload2:



    
function setUniqueFileName()
{
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


$fileName = "A" . $number;

//for an edit, use this saved filename 
$q1 = "SELECT ProductFilename from products where productID = " . $var5;
foreach ($dbo->query($q1) as $row) {

    $storedFilename = $row['ProductFilename'];

}

}


//if here image has been taken care of

/*
function deleteFIle ()
{

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
$q1 = "SELECT ProductFilename FROM products WHERE ProductID = $var5 ";
$count = $dbo3->exec($q1);

$result = mysql_query($q1);
$row = mysql_fetch_row($result);
$oldFilename = "c://localhost/PHP Proj/uploads/$row[0]";
unlink($oldfilename);
}
*/

$customerID_SESSION = 1;
$var5 = intval($var5);
 //change to get with login sessions
$name_ = "Joseph";
$password_ = "password";
$customerid = 1;

//this is saving an edited record
$host = 'localhost';
$user = 'root';
$pass = '';
$database = 'ecommerce';

$options = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_EMULATE_PREPARES => false
);

$dbo = new PDO("mysql:host=$host;dbname=$database", $user, $pass, $options);
$sql1 = "SET FOREIGN_KEY_CHECKS=0;";
$sql2 = "SET FOREIGN_KEY_CHECKS=1;";
//$dbo->exec($sql1);

//replace imagefilename in the database
$stmt = $dbo->prepare('UPDATE products SET    ProductFilename = :ProductFilename , ProductName = :ProductName,  ProductDescription = :ProductDescription , ProductCost = :ProductCost , 
ProductQuantity =  :ProductQuantity, ProductCatTitle = :ProductCatTitle , ProductKeyword1 = :ProductKeyword1, ProductKeyword2 = :ProductKeyword2, ProductKeyword3 = :ProductKeyword3,
CustomerID =:CustomerID 
WHERE ProductID = :ProductID' ); 
$stmt->execute(['ProductFilename'=> $filename,  'ProductName' => $var1, 'ProductDescription' => $var2, 'ProductCost' => $var3,   'ProductQuantity' => $var4, 'ProductCatTitle' =>  $var13 ,
'ProductKeyword1' => $var8, 'ProductKeyword2' => $var9 , 'ProductKeyword3' => $var10, 'ProductID' => $var5 , 'CustomerID' => $customerID_SESSION]);
$user = $stmt->fetch();



?>



