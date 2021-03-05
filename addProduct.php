<?php


//not used?
//GET COUNTER!!!!
function makeProductRecord($val1, $val2, $val3, $val4, $val5, $val6, $val7 , $val8, $val11, $val12, $val13, $val14, $val15, $val16, $val17)
{



$gKeyword1 = "";
$gKeyword2 = "";
$gKeyword3 = "";

$key1ID = "";
$key2ID = "";
$key3ID = "";
$counter = 0;
$counter = $counter + 1;
$BtitleID = "titleID" . $counter;
$BdescID = "descID" . $counter;
$BcostID = "costID" . $counter;
$BquantityID = "quantityID" . $counter;
$Bkey1ID = "key1ID" . $counter;
$Bkey2ID = "key2ID" . $counter;
$Bkey3ID = "key3ID" . $counter;
//$keywordID_ = "keyidID" . counter;

$BproductID = "";
$image = "temp";
$title1  = "";
$description ="";
$cost  = 0;
$quantity = 0;
$BkeywordID = "";
//pretend has ID
$category = "";

$var = "B"; 
$mainDiv = $var . (string)$counter;



//fill this when in function first time

$host = 'localhost';
$user = 'root';
$pass = '';
$database = 'ecommerce';

$options = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_EMULATE_PREPARES => false
);


//REMOVE ALL THIS!!!!!!!!!!!!
$dbo3 = new PDO("mysql:host=$host;dbname=$database", $user, $pass, $options);


/*$string0 = "


<div style = \"background-color:yellow;\" class = \"B\" id = \"$mainDiv\">



<p id = \"add\" >product id   :$productID</p>
<p>category id  :$category</p>
<center><p><h2>TO ADD:<h2></p></center>
";

$string0 .= "<select id = \"dropDown2\" >";


foreach ($dbo3->query($q4) as $row2) {

//$string0 .= "<br>" ;


$string0 .=  "<option value = \"";
//value
$string0 .=  $row2['Title']  ;
$string0 .= "\"";

if($row2['Title'] == $row2['CategorySelected'])
{
	$string0 .=  " selected = \"selected\"  ";
}

$string0 .= "\">";
//label
$string0 .=  $row2['Title'];
$string0 .= "</option>";

}



$string0 .= "<br>";
$string0 .= '</select>';

//echo $string0;

*/

$string0 =  "  

<div class=\"container\">
  <div class=\"row\" >

	
	
	<div class=\"col\">
    <h4><center><p id = \"\">Image</p></center></h4>    
	<center><p id = \"\"> $image </p></center>
	</div>


	<div class=\"col\">
      <h4><center><p id =\"\"  >Title</p></center></h4>        
      
	<center>      <p  >      <input id = \"$titleID\" value = \"$title1\" type=\"text\" name=\"title\" placeholder=\"$title1\"></p></center>
    </div>
	
	
	<div class=\"col\">
      <h4><center><p id = \"\">Desc</p></center></h4>
      
	  <center><textarea wrap id = \"$descID\"   value = \"$description\"  name=\"text\" rows=\"5\" cols=\"34\">$description</textarea></center>
	  </div>
    
	<div class=\"col\">
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
	//<center><button id = \"\" onclick = \"SaveProductItems( $productID, $titleID, $descID, $costID,$quantityID, $key1ID , $key2ID , $key3ID )\">Submit</button></center>
    center><button id = \"\" onclick = \"SaveAddProductItems( )\">Submit</button></center>
	
    <center><button id = \"\" onclick = \"deleteRecord('{$mainDiv}', $productID)\">Delete</button></center>
	<center><button id = \"\" onclick = \"addRecord()\">Add</button></center>

	
	</div>
	<br><br>

	
</div>
</div>	
	


</div><!--mainDiv-->
	

	
  <br><br><br><br>
  

";//stringend



$string0 .= "<div id = \"end\"></div>";




if (!isset($myObj) && isset($string0))
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



}//end function
?>
