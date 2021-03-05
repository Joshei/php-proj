<?php


$val1 = $_GET['$val1'];
$val2 = $_GET['$val2'];
$val3 = $_GET['$val3'];
$val4  = $_GET['$val4'];
$val5  = $_GET['$val5'];


$host = 'localhost';
$user = 'root';
$pass = '';
$database = 'ecommerce';

$options = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_EMULATE_PREPARES => false
);

$dbo = new PDO("mysql:host=$host;dbname=$database", $user, $pass, $options);


    //saves in keytable already created with creat product

    //val1 val2 val3 val4


    //sql in products finds same key values in keywords table  and saves $keyid... value in the savekeywords function
	
    //$stmt = $dbo->prepare('UPDATE products SET ProductName = :ProductName,  ProductDescription = :ProductDescription , ProductCost = :ProductCost , ProductQuantity =  :ProductQuantity,
    //Keyword1ID =   :Keyword1ID ,   Keyword2ID =  :Keyword2ID   ,  Keyword3ID =  :Keyword3ID  WHERE ProductID = 3');
    //$stmt->execute(['ProductName' => $var1, 'ProductDescription' => $var2, 'ProductCost' => $var3,   'ProductQuantity' => $var4, 'Keyword1ID' => $var6, 'Keyword2ID' => $var7, 'Keyword3ID' =>  $var8  ]);
    
    
    $stmt = $dbo->prepare('UPDATE keywords SET Keyword1 = :Keyword1, Keyword2 = :Keyword2 , Keyword3 = :Keyword3 WHERE KeywordID = :kid'); 
    //KeywordID  = 3');
    
    $stmt->execute([ 'Keyword1' => $val1, 'Keyword2' => $val2, 'Keyword3' => $val3,  'kid' => $val4  ]);
    
    $user = $stmt->fetch();
    
    

    ?>