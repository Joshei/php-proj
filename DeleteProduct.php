<?php
session_start();


$productID = $_GET['val1'];
$flag = $_GET['reducecountflag'];

$productID = intval($productID);
$flag = intval($flag);


if($flag)
{   //counter for amount of added records from submitting make form
    $_SESSION['lastDivCounter'] = $_SESSION['lastDivCounter'] - 1;
}

//FROM DELETE RECORD in php html string


$host = 'localhost';
$user = 'root';
$pass = '';
$database = 'ecommerce';

$options = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_EMULATE_PREPARES => false
);


//change cascading
//Delete keywords
//leave categories
//Delete product 

//product
$dbo = new PDO("mysql:host=$host;dbname=$database", $user, $pass, $options);

//$productID = 1;


$sqla = "SET FOREIGN_KEY_CHECKS=1;";
$sqlb = "SET FOREIGN_KEY_CHECKS=0;";

//make a session variable at login
//$CustomerID = 7;

//$dbo->exec($sqla);


//could use cascaed on delete instead
$sql1 = $dbo->prepare("DELETE  from products WHERE ProductID = :ProductID ");
$sql1->bindParam(':ProductID', $productID);
$sql1->execute();

//$custid = $dbo->lastInsertId();


//$sql1 = $dbo->prepare("DELETE  from categories WHERE ProductID = :ProductID ");
//$sql1->bindParam(':ProductID', $productID);
//$sql1->execute();


//$sql1 = $dbo->prepare("DELETE  from keywords WHERE ProductID = :ProductID ");
//$sql1->bindParam(':ProductID', $productID);
//$sql1->execute();


//$sql1 = $dbo->prepare("DELETE  from customers WHERE CustomerID = :custID ");
//$sql1->bindParam(':CustomerID', $custID);
//$sql1->execute();


?>
