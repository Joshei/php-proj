<?php

//chane this to logon session
$makeSessionCustID = 1;


$host = 'localhost';
$user = 'root';
$pass = '';
$database = 'ecommerce';

$options = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_EMULATE_PREPARES => false
);



$dbo3 = new PDO("mysql:host=$host;dbname=$database", $user, $pass, $options);


//get categorys from products where owned by customer is 1 
//$q4 = "SELECT * FROM categories INNER JOIN customers on customers.CategoryID = categories.CatID and customers.CustomerID = 1 ";
$q4 = "SELECT DISTINCT products.ProductCatTitle  FROM products inner  join customers ON customers.CustomerID = products.CustomerID and customers.CustomerID = $makeSessionCustID  ";

$string0 = "<center><br><br><select id = \"dropDown1\" >";


foreach ($dbo3->query($q4) as $row2) {

$string0 .=  "<option value = \"";
//value of option
$string0 .=  $row2['ProductCatTitle']  ;
$string0 .= "\"";

$string0 .= ">";
//text in dropdown
$string0 .=  $row2['ProductCatTitle'];
$string0 .= "</option></center>";

}




$string0 .= '</select>';
$string0 .= "<br>";

//echo $string0;


if (1);//!isset($myObj) && isset($string0))
{
$myObj = new stdClass();
$myObj->htmlstuff = $string0;
//$myObj->
//$myObj->id;

//Encode the data as a JSON string
$jsonStr = json_encode($myObj);
echo $jsonStr;
}
//echo $string1;
?>

