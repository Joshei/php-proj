<?php
//require("upload2.php"); 


//to do:
// add file name to database
// upload file - if filename has been set
//display copy of record



function insertNewRecord(  $fileID, $filename, $title, $descID ,   $productID, $titleID ,$costID ,$quantityID,$key1ID  ,$key2ID  ,$key3ID  ,$gKeyword1 , $gKeyword2  ,$gKeyword3  ,$image     ,$description,  $cost    ,$quantity ,  $category  )
{


    
//$file = $filename;       //   $_GET['filename'];
$var1 = $title;            //   $_GET['val1'];//ProductTitle
$var2 = $description;      //   $_GET['val2'];//ProductDescription
$var3 =  $cost;            //   $_GET['val3'];//ProductCost
$var4 =  $quantity;        //   $_GET['val4'];//ProductQuantity
$var8  = $key1ID;          //   $_GET['val8'];//key1
$var9 = $key2ID;           //   $_GET['val9'];//key2
$var10 = $key3ID;          //   $_GET['val10'];//key3
$var5 = $productID;        //   $_GET['val5'];//ProductID
//dropdown selected text
$var13 = $category;        //   $_GET['val13'];
//$file = $_GET['filename'];
//$var14 = $_GET['val11'];


$var3 = intval($var3);
$var4 = intval($var4);//if here image has been taken care of. move these functions to upload2:




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


//ProductFilename already in database form upload2.php
$stmt = $dbo->prepare('UPDATE products SET   ProductName = :ProductName,  ProductDescription = :ProductDescription , ProductCost = :ProductCost , 
ProductQuantity =  :ProductQuantity, ProductCatTitle = :ProductCatTitle , ProductKeyword1 = :ProductKeyword1, ProductKeyword2 = :ProductKeyword2, ProductKeyword3 = :ProductKeyword3,
CustomerID =:CustomerID 
WHERE ProductID = :ProductID' ); 

$stmt->execute(['ProductName' => $var1, 'ProductDescription' => $var2, 'ProductCost' => $var3,   'ProductQuantity' => $var4, 'ProductCatTitle' =>  $var13 ,
'ProductKeyword1' => $var8, 'ProductKeyword2' => $var9 , 'ProductKeyword3' => $var10, 'ProductID' => $var5 , 'CustomerID' => $customerID_SESSION]);
//$user = $stmt->fetch();




//$stmt = $dbo->prepare("INSERT INTO products (ProductFilename, ProductName ,  ProductDescription , ProductCost , ProductQuantity, ProductCatTitle, ProductKeyword1, ProductKeyword2, ProductKeyword3, CustomerID) 
//VALUES (:ProductFilename, :ProductName, :ProductDescription, :ProductCost ,:ProductQuantity, :ProductCatTitle , :ProductKeyword1, :ProductKeyword2, :ProductKeyword3 ,:CustomerID)"); 
//$stmt->execute(['ProductFilename' => $filename, 'ProductName' => $title, 'ProductDescription' => $description, 'ProductCost' => $cost,   'ProductQuantity' => $quantity, 'ProductCatTitle' => $category,
//'ProductKeyword1' => $gKeyword1, 'ProductKeyword2'=> $gKeyword2, 'ProductKeyword3' =>$gKeyword3 , 'CustomerID' => $customerID_SESSION  ]);
//$user = $stmt->fetch();




//$test = "test";
//return $test;
}
?>

