<?php


$keyword1 = $_GET['keyword'];
$titleOfSelectedDropDown = $_GET['val1'];

//debugging
//$titleOfSelectedDropDown = "pick";
//$keyword1 = "apple1";


$host = 'localhost';
$user = 'root';
$pass = '';
$database = 'ecommerce';

$options = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_EMULATE_PREPARES => false
);

//scope
$gKeyword1 = "";
$gKeyword2 = "";
$gKeyword3 = "";

$key1ID = "";
$key2ID = "";
$key3ID = "";


$dbo = new PDO("mysql:host=$host;dbname=$database", $user, $pass, $options);

$string1 = "<center><h1><u>Search Results</u><h1></center></p>";


//dont forget unique value for title 
//this finds all products that have the keyword apple1
$q1 = "SELECT products.ProductName, products.ProductID, products.ProductDescription, products.ProductCost, products.ProductQuantity, products.ProductCatTitle 

FROM products 
INNER JOIN customers ON customers.CustomerID = products.CustomerID
WHERE ((products.ProductKeyWord1 = \"$keyword1\") OR 
 (products.ProductKeyWord2 = \"$keyword1\") or (products.ProductKeyWord3 = \"$keyword1\" )) and products.ProductCatTitle = \"$titleOfSelectedDropDown\"  ";



//this finds all products that have the keyword apple1
//$q1 = "SELECT customers.CustomerID, customers.Password, customers.FirstName, customers.LastName, customers.City, customers.State,
// products.ProductName, products.ProductID, products.ProductDescription, products.ProductCost, products.ProductQuantity 
//FROM products 
//INNER JOIN customers ON customers.CustomerID = products.CustomerID
//WHERE ((products.KeyWord1 = \"$keyword1\") OR 
// (productss.KeyWord2 = \"$keyword1\") or (products.KeyWord3 = \"$keyword1\" )) ";




$deleteFlag = 1;
//$string1 ="";
$counter = 0;
$counter1 = 0;
$numbervar = 1;
$mainDiv = "";
//$password1 = "bb";//$row['Password'];
//$firstname =  "aa";//;//$row['FirstName'];
//$lastname = "aa";////$row['LastName'];
//$city  =  "aa";////$row['City'];
//$state  =  "aa";////$row['State'];

foreach ($dbo->query($q1) as $row) {

$counter = $counter + 1;
$titleID = "titleID" . $counter;
$descID = "descID" . $counter;
$costID = "costID" . $counter;
$quantityID = "quantityID" . $counter;
$key1ID = "key1ID" . $counter;
$key2ID = "key2ID" . $counter;
$key3ID = "key3ID" . $counter;

$productID = $row['ProductID'];
$image = "temp";
$title1  = $row['ProductName'];
$description =$row['ProductDescription'];
$cost  = $row['ProductCost'];
$quantity = $row['ProductQuantity'];


//$customerid = $row['CustomerID'];
$category = $row['ProductCatTitle'];


$var = "A"; 
$mainDiv = $var . (string)$counter;

$dbo1 = new PDO("mysql:host=$host;dbname=$database", $user, $pass, $options);


//$sql2 = "SELECT * from keywords INNER JOIN products  on products.Keyword1ID = keywords.KeywordID  AND products.Keyword1ID =  $keywordID ";
//should work altered after database changed
$sql2 = "SELECT ProductKeyword1, ProductKeyword2, ProductKeyword3 FROM products where products.ProductID =  $productID ";


foreach($dbo1->query($sql2) as $row1)
{

	$gKeyword1 = $row1['ProductKeyword1'];
	$gKeyword2 = $row1['ProductKeyword2'];
	$gKeyword3 = $row1['ProductKeyword3'];
	
}


$dbo3 = new PDO("mysql:host=$host;dbname=$database", $user, $pass, $options);






$string1 .=  "  

<div  class = \"A\" id = \"$mainDiv\">


<p id = \"link1\">product id   :$productID</p>
<p>category id  :$category</p>





<div class = \"A\" id = \"endz\"></div>
<div class = \"A\" id = \"startz\"></div>


<div class=\"container\">
  <div class=\"row\" >

	
	
	<div class=\"col\">
    <h4><center><p id = \"\">Image</p></center></h4>    
	<center><p id = \"\"> $image </p></center>
	</div>


	<div class=\"col\">
      <h4><center><p id =\"\"  >Title</p></center></h4>        
      
	<center>      <p  >      <input id = \"$titleID\" value = \"$title1\" type=\"text\" name=\"title\" placeholder=\"\"></p></center>
    </div>
	
	
	<div class=\"col\">
      <h4><center><p id = \"\">Desc</p></center></h4>
      
	  <center><textarea wrap id = \"$descID\"   value = \"$description\"  type=\"text\" rows=\"5\" cols=\"34\">$description</textarea></center>
	  </div>
    
	<div class=\"col\">
      <h4><center><p id = \"\" >Cost</p></center></h4>
	<center><p>	<input id = \"$costID\" value = \"$cost\" type=\"number\" name=\"title\" placeholder=\"$cost\">		</p></center>
	
	</div>
	

	</div>
	</div>


	<div class=\"container\">
	  <div class=\"row\" >
	  
	<div class=\"col\">
    <h4><center><p id = \"\" >Quantity</p></center></h4>    
	<center><p> <input id = \"$quantityID\" value = \"$quantity\" type=\"number\" name=\"title\" placeholder=\"\">	</p></center>
	</div>

	
	
	<!--already presumably, has keyword save in keywords from creating product , it stays the same-->

	<!--these ids hold new values to same in same keys set up at product creation -->
	
	<!-- Just holds values for call from saveproductitems because it calls save keywords-->

	<div class=\"col\">
      <h4><center><p id = \"\" >Keyword 1</p></center></h4>
	<center><p>	<input id = \"$key1ID\" value = \"$gKeyword1\" type=\"text\" name=\"title\" placeholder=\"\">		</p></center>
	
	</div>


	<div class=\"col\">
      <h4><center><p id = \"\" >Keyword 2</p></center></h4>
	<center><p>	<input id = \"$key2ID\" value = \"$gKeyword2\" type=\"text\" name=\"title\" placeholder=\"\">		</p></center>
	
	</div>


	<div class=\"col\">
      <h4><center><p id = \"\" >Keyword 3</p></center></h4>
	<center><p>	<input id = \"$key3ID\" value = \"$gKeyword3\" type=\"text\" name=\"title\" placeholder=\"\">		</p></center>
	
	
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
	<center><button id = \"\" onclick = \"SaveProductItems( $deleteFlag ,'{$mainDiv}',  $productID, $titleID, $descID, $costID,$quantityID, $key1ID , $key2ID , $key3ID )\">Submit</button></center>
	<!--flag for determining if record delete will effect sessioncount, 0 is no.-->
	<center><button id = \"\" onclick = \"deleteRecord( 1, '{$mainDiv}', $productID)\">Delete</button></center>
	<p><a href=\"#add\">To Add</a></p>
	
	</div>
	<br><br>

	
</div>
</div>	
	


</div><!--mainDiv-->
	

	
  <br><br><br><br>
  

";//stringend
}//for



$string1 .= "</div>";//maindiv



$deleteFlag = 0;
$gKeyword1 = "";
$gKeyword2 = "";
$gKeyword3 = "";

$bkey1ID = "";
$bkey2ID = "";
$bkey3ID = "";
//$counter = 0;
$counter = $counter + 1;
$btitleID = "btitleID" . $counter;
$bdescID = "bdescID" . $counter;
$bcostID = "bcostID" . $counter;
$bquantityID = "bquantityID" . $counter;
$bkey1ID = "bkey1ID" . $counter;
$bkey2ID = "bkey2ID" . $counter;
$bkey3ID = "bkey3ID" . $counter;

$keywordID = 0;
$productID = 0;
$image = "temp";
$title1  = "";
$description ="";
$cost  = 0;
$quantity = 0;

$keywordID = 0;

$category = "0";


$var = "C"; 
$mainDiv = $var . (string)$counter;








/* $q4 = "SELECT * FROM categories INNER JOIN customers on customers.CategoryID = categories.CatID and customers.CustomerID = 1 ";

$string1 .= "






<p id = \"add\" >product id   :$productID</p>
<p>category id  :$category</p>
<center><p><h2>TO ADD:<h2></p></center>
";

$string1 .= "<select id = \"dropDown2\" >";


foreach ($dbo1->query($q4) as $row2) {

//$string0 .= "<br>" ;


$string1 .=  "<option value = \"";
//value
$string1 .=  $row2['Title']  ;
$string1 .= "\"";

if($row2['Title'] == $row2['CategorySelected'])
{
	$string1 .=  " selected = \"selected\"  ";
}

$string1 .= "\">";
//label
$string1 .=  $row2['Title'];
$string1 .= "</option>";

}



$string1 .= "<br>";
$string1 .= '</select>';

//echo $string0; */



$string1 .=  "  

<div style = \"background-color:yellow;\" class = \"A\" id = \"$mainDiv\">
<center><h1>Add Product Form<h1></center></p>
<div class=\"container\">
  <div class=\"row\" >
	<div class=\"col\">
    <h4><center><p id = \"\">Image</p></center></h4>    
	<center><p id = \"\"> $image </p></center>
	</div>


	<div class=\"col\">
      <h4><center><p id =\"\"  >Title</p></center></h4>        
      
	<center>      <p  >      <input id = \"$btitleID\" value = \"$title1\" type=\"text\" name=\"title\" placeholder=\"\"></p></center>
    </div>
	
	
	<div class=\"col\">
      <h4><center><p id = \"\">Desc</p></center></h4>
      
	  <center><textarea wrap id = \"$bdescID\"   value = \"$description\"  name=\"text\" rows=\"5\" cols=\"34\">$description</textarea></center>
	  </div>
    
	<div class=\"col\">
      <h4><center><p id = \"\" >Cost</p></center></h4>
	<center><p>	<input id = \"$bcostID\" value = \"$cost\" type=\"number\" name=\"title\" placeholder=\"\">		</p></center>
	
	</div>
	

	</div>
	</div>


	<div class=\"container\">
	  <div class=\"row\" >
	  
	<div class=\"col\">
    <h4><center><p id = \"\" >Quantity</p></center></h4>    
	<center><p> <input id = \"$bquantityID\" value = \"$quantity\" type=\"number\" name=\"title\" placeholder=\"\">	</p></center>
	</div>

	
	
	<!--already presumably, has keyword save in keywords from creating product , it stays the same-->

	<!--these ids hold new values to same in same keys set up at product creation -->
	
	<!-- Just holds values for call from saveproductitems because it calls save keywords-->

	<div class=\"col\">
      <h4><center><p id = \"\" >Keyword 1</p></center></h4>
	<center><p>	<input id = \"$bkey1ID\" value = \"$gKeyword1\" type=\"text\" name=\"title\" placeholder=\"\">		</p></center>
	
	</div>


	<div class=\"col\">
      <h4><center><p id = \"\" >Keyword 2</p></center></h4>
	<center><p>	<input id = \"$bkey2ID\" value = \"$gKeyword2\" type=\"text\" name=\"title\" placeholder=\"\">		</p></center>
	
	</div>


	<div class=\"col\">
      <h4><center><p id = \"\" >Keyword 3</p></center></h4>
	<center><p>	<input id = \"$bkey3ID\" value = \"$gKeyword3\" type=\"text\" name=\"title\" placeholder=\"\">		</p></center>
	
	
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
	
	
<!-- $gKeyword1 -->
<!--$gKeyword2 -->
<!--$gKeyword3 -->
<!--$productID-->
<!--$image -->
<!--$title1  -->
<!--$description -->
<!--$cost  -->
<!--$quantity -->
<!--$keywordID -->
<!--pretend has ID-->
<!--$category -->

	
<!--ON YELLOW FORM
//and add new record in database
//and delete the data in make form  
calls this function which updates a new record
before this is a record that can be changed and submitter
after submit delete-->

<center><button id = \"\" onclick = \"displayAddProductChanges(  $productID, '{$btitleID}', '{$bdescID}', '{$bcostID}','{$bquantityID}','{$bkey1ID}' , '{$bkey2ID}' ,
 '{$bkey3ID}', '{$category}'  )\">Submit</button></center>
	
	

	

	
	</div>
	<br><br>

	
</div>
</div>	
	


</div><!--mainDiv-->
	

	
  <br><br><br><br>
  

";//stringend


$string1 .= "<div id = \"start1\"> this is start1</div>";

?>



<?php
if (!isset($myObj) && isset($string1))
{
$myObj = new stdClass();
$myObj->htmlstuff = $string1;


//Encode the data as a JSON string
$jsonStr = json_encode($myObj);
echo $jsonStr;
}

?>