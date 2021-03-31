<?php
//session_start();

	
include ("insertNewProduct.php"); 


if ((!isset($_SESSION['lastDivCounter'])))  
{
	
		$_SESSION['lastDivCounter']  = 0;
}

	//$imageID = $_GET['imageID'];
	$imageID = $_GET['imageID'];
	$fileID = $_GET['fileID'];
	$descID = $_GET['bdescID'];
	$title1    = $_GET['title1'];
	$productID = $_GET['productID'];
	 $titleID = $_GET['btitleID'];
	 
	 $costID = $_GET['bcostID'];
	 $quantityID = $_GET['bquantityID'];
	 $key1ID  = $_GET['bkey1ID'];
	 $key2ID  = $_GET['bkey2ID'];
	 $key3ID  = $_GET['bkey3ID'];
	$gKeyword1   = $_GET['gKeyword1'];
	$gKeyword2   = $_GET['gKeyword2'];
 	$gKeyword3  = $_GET['gKeyword3'];
  	$image      = $_GET['image'];
   	$description  = $_GET['description'];
	$cost    = $_GET['cost'];
	$quantity   = $_GET['quantity'];
	$category = $_GET['category'];
	//$password = $_Get['password'];
	//$firstname= $_Get['firstname'];
	//$lastname = $_Get['lastname'];
	//$city = $_Get['city'];
	//$state = $_Get['state'];
	//$customerid = $_GET['customerid']; 
	
	
	//$filename = $_Get['filename'];
	$filename = "";
	
////////

$host = 'localhost';
$user = 'root';
$pass = '';
$database = 'ecommerce';

$options = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_EMULATE_PREPARES => false
);

$dbo = new PDO("mysql:host=$host;dbname=$database", $user, $pass, $options);

$var1 = "Ready to insert record!";

$stmt = $dbo->prepare("INSERT INTO products (ProductName) VALUES (?)");
$stmt->bindParam(1, $var1);
$stmt->execute();

$stmt = $dbo->prepare("SELECT ProductID FROM products ORDER BY productID DESC LIMIT 1");
$stmt->execute();
$productID = 0;

//gets current record being built
while ($row = $stmt->fetch()) 
{
	$productID = $row['ProductID'];

}
////////

$deleteFlag = 1;

$counter = -1;
$counter = $counter + 1;

$image = "temp";

$var = "F"; 
$mainDiv = $var . (string)$_SESSION['lastDivCounter'];

$var1 = "E"; 
$mainDiv1 = $var1 . (string)$_SESSION['lastDivCounter'];




$_SESSION['lastDivCounter'] = $_SESSION['lastDivCounter'] +1;


$host = 'localhost';
$user = 'root';
$pass = '';
$database = 'ecommerce';

$options = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_EMULATE_PREPARES => false
);



$dbo3 = new PDO("mysql:host=$host;dbname=$database", $user, $pass, $options);

$string0 =  "  


<p id = \"link1\">product id   :$productID</p>
<div style = \"background-color:#40e0d0;\" class = \"A\" id = \"$mainDiv\">
<center><h1>Added Record<h1></center></p>
<div class=\"container\">


  <div class=\"row\" >

	
	<div class = \"col\">

	<iframe id=\"upload_target\" name=\"upload_target\"  style=\"width:0;height:0;border:0px solid #fff;\"></iframe> 	
	
	
	<div class=\"text-left\">

	<form   target=\"upload_target\"  method = \"POST\" action = \"upload2a.php\" enctype=\"multipart/form-data\">
	
	<input type=hidden id=\"$productID\" name= \"productID\" value=\"$productID\">
	<!--
	<input type=hidden id=\"$filename\" name=\"filename\" value=\"$filename\">
	-->
	
	<input  type = \"file\" name = \"file\" id = \"$fileID\">
	<br><br>
	<button    value = \"Submit\" type = \"submit\"  >submit it</button>
	
	
	</form>

	<div id = \"text-left\">
	<button    onclick = \"imageRefresh( '{$filename}', '{$imageID}')\" >Confirm</button><br><br>
	</div>

	</div>

	<img class=\"NO-CACHE\" width=\"120\" height =\"120\"  id = \"$imageID\"  src=\"http://localhost/phpproj/uploads/$filename?<?php filemtime('$filename') ?>\">No Image</img>
	
	
	</div>
	
	
	


	<div class=\"col\"><br><br><br><br>
      <h4><center><p id =\"\"  >Title</p></center></h4>        
      
	<center><p>      <input id = \"$titleID\" value = \"$title1\" type=\"text\" name=\"\" placeholder=\"\"></p></center>
    </div>
	
	
	<div class=\"col\">
      <h4><center><p id = \"\">Desc</p></center></h4>
      
	  <center><textarea wrap id = \"$descID\"   value = \"$description\"  name=\"text\" rows=\"5\" cols=\"34\">$description</textarea></center>
	  </div>
    
	<div class=\"col\"><br><br>
      <h4><center><p id = \"\" >Cost</p></center></h4>
	<center><p>	<input id = $costID value = $cost type=\"number\" name=\"title\" placeholder=\"$cost\">		</p></center>
	
	</div>
	

	</div>
	</div>


	<div class=\"container\">
	  <div class=\"row\" >
	  
	<div class=\"col\">
    <h4><center><p id = \"\" >Quantity</p></center></h4>    
	<center><p> <input id = $quantityID value = $quantity type=\"number\" name=\"title\" placeholder=\"$quantity\">	</p></center>
	</div>

	
	
	<!--already presumably, has keyword save in keywords from creating product , it stays the same-->

	<!--these ids hold new values to same in same keys set up at product creation -->
	
	<!-- Just holds values for call from saveproductitems because it calls save keywords-->

	<div class=\"col\">
      <h4><center><p id = \"\" >Keyword 1</p></center></h4>
	<center><p>	<input id = \"$key1ID\" value = \"$gKeyword1\" type=\"text\" name=\"title\" placeholder=\"$gKeyword1\">		</p></center>
	
	</div>


	<div class=\"col\">
      <h4><center><p id = \"\" >Keyword 2</p></center></h4>
	<center><p>	<input id = \"$key2ID\" value = \"$gKeyword2\" type=\"text\" name=\"title\" placeholder=\"$gKeyword2\">		</p></center>
	
	</div>


	<div class=\"col\">
      <h4><center><p id = \"\" >Keyword 3</p></center></h4>
	<center><p>	<input id = \"$key3ID\" value = \"$gKeyword3\" type=\"text\" name=\"title\" placeholder=\"$gKeyword3\">		</p></center>
	
	
	</div>
	

	<br><br>
	</div>
	</div>
	

<div class=\"container\">
  <div class=\"row\" >


	<!-- the keys are   -->
	<div class=\"col\">

    <!-- these are the ids of keywords to save next in a function called from this one for savekeywords.  (id has the product id)   key1D, etc. is the id for the call in here -->
	<!--product id is the number value for the key of the product -->
	<center><button id = \"\" onclick = \"SaveProductItems(  $productID,  $deleteFlag, '{$mainDiv}',   '{$titleID}', '{$descID}', '{$costID}','{$quantityID}', '{$key1ID}' , '{$key2ID}' , '{$key3ID}'  )\">Resubmit</button></center>
    
	
    <center><button id = \"\" onclick = \"deleteRecord(1, '{$mainDiv}', '{$productID}' )\">Delete</button></center>

	</div>
	

	
</div>
</div>	
	


</div><!--mainDiv-->
	

	
  
  

";//stringend




//to do:
// add file name to database
// upload file - if filename has been set
//display copy of record


insertNewRecord( $fileID, $filename, $title1, $descID ,$productID, $titleID  ,$costID ,$quantityID,$key1ID  ,$key2ID  ,$key3ID  ,$gKeyword1 , $gKeyword2  ,$gKeyword3  ,$image     ,$description,  $cost    ,$quantity ,  $category  );

//////////
//move this





if (!isset($myObj) && isset($string0))
{
$myObj = new stdClass();
$myObj->htmlstuff = $string0;


//Encode the data as a JSON string
$jsonStr = json_encode($myObj);
echo $jsonStr;


}





?>



    
    










