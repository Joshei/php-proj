<?php
//STILL CALLED BY HTML SCRIPT by PHP

//this is for updates, saves a record that has been updated
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
//categoryID
//$var14 = $_GET['val14'];

//customer ID
//$var15 = $_GET['val15'];
$customerID_SESSION = 1;



//$var14 = intval($var14);
$var5 = intval($var5);
//$var7 = intval($var7);
//$var15 = 

//change to get with login sessions
$name_ = "Joseph";
$password_ = "password";
$customerid = 1;


//product id - set above
//$var5 = 26;



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

//created at login time
//$stmt = $dbo->prepare('UPDATE customers SET Name = :Name, Password = :Password, FirstName = : FirstName, LastName = : LastName, City = : City, State = : State where CustomerID = :CustomerID '  );
//$stmt->execute([ 'FirstName' => , 'LastName => ' $name_ , 'Password' => $password_ ,'City' =>, 'State' => WHERE 'CustomerID' => $var15]);
//$user = $stmt->fetch();

$stmt = $dbo->prepare('UPDATE products SET    ProductName = :ProductName,  ProductDescription = :ProductDescription , ProductCost = :ProductCost , 
ProductQuantity =  :ProductQuantity, ProductCatTitle = :ProductCatTitle , ProductKeyword1 = :ProductKeyword1, ProductKeyword2 = :ProductKeyword2, ProductKeyword3 = :ProductKeyword3,
CustomerID =:CustomerID 
WHERE ProductID = :ProductID' ); 
$stmt->execute(['ProductName' => $var1, 'ProductDescription' => $var2, 'ProductCost' => $var3,   'ProductQuantity' => $var4, 'ProductCatTitle' =>  $var13 ,
'ProductKeyword1' => $var8, 'ProductKeyword2' => $var9 , 'ProductKeyword3' => $var10, 'ProductID' => $var5 , 'CustomerID' => $customerID_SESSION]);
$user = $stmt->fetch();
?>



