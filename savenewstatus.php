<?php
$status = $_GET['status'];
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
$q1 = "UPDATE products SET ProductStatus = '" . $status . "' WHERE ProductID = " . $prodID . " "; 
$count = $dbo3->exec($q1);
echo " ";
?>