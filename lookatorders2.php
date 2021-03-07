<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$database = 'ecommerce';

$options = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_EMULATE_PREPARES => false
);

$counter = 0;
$printRadio = "no";
$lastOrderID = "start";
$statusA = ""; 
$statusB = "";
$statusC = ""; 
$pID = "";
$color = 1;
$sql = "SELECT  orders.OrderDate, products.ProductStatus, products.OrderID, products.ProductName, products.ProductCost, products.ProductQuantity 
FROM orders INNER JOIN  products ON orders.OrderID = products.OrderID
WHERE products.ProductStatus = \"purchased\" ORDER BY Orders.OrderID, Orders.OrderDate DESC";


$dbo0 = new PDO("mysql:host=$host;dbname=$database", $user, $pass, $options);

$string0 = "
<br>
  <center><button onclick = \"submitChanges()\">Submit Changes</button></center>
";


$string0 .=  "
<br>
<div class=\"container\">

";
//$string0 .= "<table style=\"background-color:gold\" width:100% border = \"1\" >";
//<table style=\"width:100%\" border=\"1\" > 





foreach($dbo0->query($sql) as $row1)
{

  $statusA = "statusA" . $counter; 
  $statusB = "statusB" . $counter;
  $statusC = "statusC" . $counter; 


$counter++;
$orderDate = "abc";


$lastOrderID = 	$pID;
$pID = $row1['OrderID']; 



//if($pID != $lastOrderID && $lastOrderID != "start")
//{
//  $printRadio = "yes";
//}

$pName = $row1['ProductName']; 
$pCost = $row1['ProductCost']; 
$pQuant = $row1['ProductQuantity']; 

$pID = strval ($pID); 
$pCost = strval ($pCost); 
$pQuant = strval ($pQuant); 





//in for loop
//if pID just changed  OR JUST STARTED

if($pID != $lastOrderID )
{
  //$string0 .=  "</table>";


  if($lastOrderID == "")
  {
    $string0 .=  " <table width=100%    border = \"1\"  style=  \"background-color:gold\" > ";
  }
  else
  {
    $string0 .=  " <table width=100%    border = \"1\"  style=  \"background-color:turquoise\" > ";

  }

  $string0 .= "
<tr>
<th>Status</th>
<th>Date</th> 
<th>ID</th> 
<th>Product</th>
<th>Quantity</th>
<th>Cost</th> 
</tr>


<tr>
<td>STATUS HERE</td>
<td>" . $orderDate . " </td>
<td>" . $pID . "</td>
<td>" . $pName . "</td>
<td>" . $pQuant  . "</td>
<td>" . $pCost . "</td>
</tr>
";
//if($lastOrderID != "")
//{
//  $string0 .= "TOTAL COST: $50.00";
//}


}
//same pid as last pid
else
{
  
 $string0 .= "

</table  > 
 <input type=\"radio\" id=\"$statusA\" name=\"age\" value=\"30\">
 <label>      Purchased      </label>
  <input type=\"radio\" id=\"$statusB\" name=\"age\" value=\"60\">
  <label> Shipped </label>  
  <input type=\"radio\" id=\"$statusC\" name=\"age\" value=\"100\">
  <label>Refunded </label>
 
   <table width=100%    border = \"1\" >
  

<th class = \"one\">Status</th>
<th class = \"one\">Date</th> 
<th class = \"one\" >ID</th> 
<th  class = \"one\">Product</th>
<th class = \"one\">Quantity</th>
<th class = \"one\">Cost</th> 
</tr>";

if($color == 1)
{
  
 $string0 .= "<tr bgcolor = \"gold\">";
}
else
{
  $string0 .= "<tr bgcolor = \"blue\">";
}

$string0 .= "

<td>STATUS HERE</td>
<td>" . $orderDate . " </td>
<td>" . $pID . "</td>
<td>" . $pName . "</td>
<td>" . $pQuant  . "</td>
<td>" . $pCost . "</td>
</tr>

</table>


<input type=\"radio\" id=\"$statusA\" name=\"age\" value=\"30\">
<label >Purchased </label>
  <input type=\"radio\" id=\"$statusB\" name=\"age\" value=\"60\">
  <label >Shipped </label>  
  <input type=\"radio\" id=\"$statusC\" name=\"age\" value=\"100\">
  <label >Refunded </label>

";


if($color == 1)
{
  $string0 .=  " <table width=100%    border = \"1\"  style=  \"background-color:gold\" > ";

}
else
{
  $string0 .=  " <table width=100%    border = \"1\"  style=  \"background-color:turquoise\" > ";
}
}








}//for each




$string0 .= "</table>";


$string0 .= "<input type=\"radio\" id=\"$statusA\" name=\"age\" value=\"30\">
 <label >Purchased </label>
  <input type=\"radio\" id=\"$statusB\" name=\"age\" value=\"60\">
  <label >Shipped </label>  
  <input type=\"radio\" id=\"$statusC\" name=\"age\" value=\"100\">
  <label >Refunded </label>


  <br>
  <center><button onclick = \"submitChanges()\">Submit Changes</button></center>

";



if (!isset($myObj) && isset($string0))
{
$myObj = new stdClass();
$myObj->htmlstuff = $string0;


//Encode the data as a JSON string
$jsonStr = json_encode($myObj);
echo $jsonStr;


}

?>


