<?php
//https://stackoverflow.com/questions/362614/calling-onclick-on-a-radiobutton-list-using-javascript

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
$sql = "SELECT products.ProductID ,customers.SAddress1, customers.SAddress2, customers.ZipCode, customers.FirstName, customers.LastName, customers.City, customers.State, products.ProductStatus, orders.OrderDate, products.OrderID, products.ProductName, products.ProductCost, products.ProductQuantity FROM orders INNER JOIN  products ON orders.OrderID = products.OrderID INNER JOIN customers ON orders.CustomerID
=  customers.CustomerID ORDER BY Orders.OrderID, Orders.OrderDate DESC"; 

$dbo0 = new PDO("mysql:host=$host;dbname=$database", $user, $pass, $options);

//$string0 = "
//<br>
//  <center><button onclick = \"submitChanges()\">Submit Changes</button></center>
//";


$string0 =  "
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
  $statusD = "statusD" . $counter; 

  $status2A = "status2A" . $counter; 
  $status2B = "status2B" . $counter;
  $status2C = "status2C" . $counter; 
  $status2D = "status2D" . $counter; 


  $statusID = "statusID" . $counter;
  $status2ID = "status2ID" . $counter;

$counter++;
$orderDate = "abc";


$lastOrderID = 	$pID;
$pID = $row1['OrderID']; 
$prodID = $row1['ProductID'];




$pName = $row1['ProductName']; 
$pCost = $row1['ProductCost']; 
$pQuant = $row1['ProductQuantity']; 

$pID = strval ($pID); 
$pCost = strval ($pCost); 
$pQuant = strval ($pQuant); 

$pStatus = $row1['ProductStatus'];


$fName = $row1['FirstName'];
$lName = $row1['LastName'];
$city = $row1['State'];
$state = $row1['City'];
$saddress1 = $row1['SAddress1'];
$saddress2 = $row1['SAddress2'];
$zipcode = $row1['ZipCode'];



//first product of a new order
if($pID != $lastOrderID )
{
 


  if($lastOrderID == "")
  {
    $string0 .=  " <table width=100%    border = \"1\"  style=  \"background-color:gold\" > ";
  }
  else
  {
    $string0 .=  " <table width=100%    border = \"1\"  style=  \"background-color:turquoise\" > ";

  }
////////////////

$string0 .= " <br><br>
<tr>
<th>First Name</th>
<th>Last Name</th> 
<th>State</th>
<th>City</th> 
<th>Address</th>
<th>Address</th>
<th>Zipcode</th>
</tr>

<tr>
<td>" . $fName . "</td>
<td>" . $lName . " </td>
<td>" . $state . "</td>
<td>" . $city . "</td>
<td style =\"word-break:break-all;\">" . $saddress1. "</td>
<td style =\"word-break:break-all;\">" . $saddress2. "</td>
<td>" . $zipcode. "</td>

</tr>
</table> ";

///////////////////

if($lastOrderID == "")
  {
    $string0 .=  " <table width=100%    border = \"1\"  style=  \"background-color:gold\" > ";
  }
  else
  {
    $string0 .=  " <table width=100%    border = \"1\"  style=  \"background-color:turquoise\" > ";

  }
///////////////////
  $string0 .= " <br><br>
<tr>
<th>Status</th>
<th>Date</th> 
<th>ID</th> 
<th>Product</th>
<th>Quantity</th>
<th>Cost</th> 
</tr>



<tr>
<td id = " . $statusID . " >$pStatus</td>
<td>" . $orderDate . " </td>
<td>" . $prodID . "</td>
<td>" . $pName . "</td>
<td>" . $pQuant  . "</td>
<td>" . $pCost . "</td>

</tr>
</table> 



<input type=\"radio\" id=\"$statusA\" name=\"status1\" value=\"A\"  onclick=\"submitChange( name,'{$statusID}', '{$prodID}')\">
 <label>Purchased</label>
  <input type=\"radio\" id=\"$statusB\" name=\"status2\" value=\"B\"  onclick=\"submitChange(name, '{$statusID}', '{$prodID}')\">
  <label>Shipped</label>  
  <input type=\"radio\" id=\"$statusC\" name=\"status3\" value=\"C\"  onclick=\"submitChange(name, '{$statusID}', '{$prodID}')\">
  <label>No Stock</label>
  <input type=\"radio\" id=\"$statusD\" name=\"status3\" value=\"D\"  onclick=\"submitChange(name, '{$statusID}', '{$prodID}')\">
  <label>Refunded</label>
  
";



//if($lastOrderID != "")
//{
//  $string0 .= "TOTAL COST: $50.00";
//}


}
//same pid as last pid

//a product of an order that is not the first product
else
{

 
 $string0 .= "
 
  

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

<td id = " . $status2ID . " >$pStatus</td>
<td>" . $orderDate . " </td>
<td>" . $prodID . "</td>
<td>" . $pName . "</td>
<td>" . $pQuant  . "</td>
<td>" . $pCost . "</td>
</tr>

</table>
  
  <input type=\"radio\" id=\"$status2A\" name=\"status5\" value=\"A\" onclick=\"submitChange(name, '{$status2ID}', '{$prodID}')\">
  <label>Purchased</label>
  <input type=\"radio\" id=\"$status2B\" name=\"status6\" value=\"B\" onclick=\"submitChange(name, '{$status2ID}', '{$prodID}')\">
  <label> Shipped </label>  
  <input type=\"radio\" id=\"$status2C\" name=\"status7\" value=\"C\" onclick=\"submitChange(name, '{$status2ID}','{$prodID}')\">
  <label>No Stock</label>
  <input type=\"radio\" id=\"$status2D\" name=\"status8\" value=\"D\" onclick=\"submitChange(name, '{$status2ID}', '{$prodID}')\">
  <label>Refunded</label>
  ";
}

}//for each

if (!isset($myObj) && isset($string0))
{
$myObj = new stdClass();
$myObj->htmlstuff = $string0;


//Encode the data as a JSON string
$jsonStr = json_encode($myObj);
echo $jsonStr;


}

?>


