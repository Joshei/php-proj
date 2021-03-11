<?php
require("upload2.php"); 


//to do:
// add file name to database
// upload file - if filename has been set
//display copy of record

function insertNewRecord(  $fileID, $filename, $title, $descID ,   $productID, $titleID ,$costID ,$quantityID,$key1ID  ,$key2ID  ,$key3ID  ,$gKeyword1 , $gKeyword2  ,$gKeyword3  ,$image     ,$description,  $cost    ,$quantity ,  $category  )
{
//if filename is unset, skip upload file

//filename is set  - aleady put in database
//upload
if (!unsset($filename))
{

    $ret = saveImageToDirectory();
    if ($ret)
    {
        setsFilenameInDir();
    }


}



$customerID_SESSION = 1;
$productID = intval($productID);
//$keywordID = intval($keywordID);
//is an ID
$category = intval($category);


$host = 'localhost';
$user = 'root';
$pass = '';
$database = 'ecommerce';

$options = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_EMULATE_PREPARES => false
);

$dbo = new PDO("mysql:host=$host;dbname=$database", $user, $pass, $options);



//CHECK THIS. POSSIBLE REDUCTION
$sql1 = "SET FOREIGN_KEY_CHECKS=0;";
$sql2 = "SET FOREIGN_KEY_CHECKS=1;";
//$dbo->exec($sql1);





$stmt = $dbo->prepare("INSERT INTO products (ProductFilename, ProductName ,  ProductDescription , ProductCost , ProductQuantity, ProductCatTitle, ProductKeyword1, ProductKeyword2, ProductKeyword3, CustomerID) 
VALUES (:ProductFilename, :ProductName, :ProductDescription, :ProductCost ,:ProductQuantity, :ProductCatTitle , :ProductKeyword1, :ProductKeyword2, :ProductKeyword3 ,:CustomerID)"); 
$stmt->execute(['ProductFilename' => $filename, 'ProductName' => $title, 'ProductDescription' => $description, 'ProductCost' => $cost,   'ProductQuantity' => $quantity, 'ProductCatTitle' => $category,
'ProductKeyword1' => $gKeyword1, 'ProductKeyword2'=> $gKeyword2, 'ProductKeyword3' =>$gKeyword3 , 'CustomerID' => $customerID_SESSION  ]);
$user = $stmt->fetch();


//customer set  up at login time

//$stmt = $dbo->prepare("INSERT INTO customers (Name, Password, FirstName, LastName, City, State) VALUES 
//(:Name,:Password, :FirstName, :LastName, :City, :State)");
//$stmt->execute([ 'Name' => $name , 'Password' => $password]),  'FirstName' => $firstname, 'LastName' => $lastname, 'City' => $city, $state => 'State';
//$user = $stmt->fetch();





$test = "test";
return $test;
}
?>

