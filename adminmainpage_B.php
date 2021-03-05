<html>
<head>


</head>
<body>


	
<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$database = 'ecommerce';

$options = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_EMULATE_PREPARES => false
);







$dbo = new PDO("mysql:host=$host;dbname=$database", $user, $pass, $options);

$q4 = "SELECT categories.Title FROM categories INNER JOIN customers on customers.CustomerID = categories.CustomerID and customers.CustomerID = 1";

echo '<select id = "dropDown1" >';

foreach ($dbo->query($q4) as $row) {
    echo "<br>";
echo  '<option value = " ';

echo  $row['title'];
echo '">';
echo $row['title'];
echo '</option>';

}
echo "<br>";
echo  '</select>';

?>
	
	
	
	
	<!--<select id = "dropDown1" name="Cars" >  
    <option value="Merceders"> Merceders </option>  
    <option value="BMW"> BMW </option>  
    <option value="Jaguar"> Jaguar </option>  
    <option value="Lamborghini"> Lamborghini </option>  
    <option value="Ferrari"> Ferrari </option>  
    <option value="Ford"> Ford </option>  
	</select>-->

	</div>
	
	</div>
	
	<br>
	
   	<button type="button" name="Add Category" value="changeDir"  onclick = "changeCategory()" >Change to Selected Category</button>
	<br><br><br>
	
	<form action = "addRow.php" method = "POST" >
	<input type="text" name="category" value = "category" placeholder="Category">
    <button type="button2" name="Category2" value = "add">Add Category</button> 
	</form>
	<br><br>
	

	<button type="button3" name="category1" value="category1" onclick = "deleteCategory()"  >Delete Category</button> 
	
	<br><br>
	
	<!-- numeric, search  -->
	<form action = "editrecord.php" method = "POST">
	<button type="button4" name="edit" value="edit">Edit Records</button>
	</form>

	
	<br><br><br>
    
	</form>
      
	</div>
    <div class="col-sm-4">
     </div>
	 </div>
	 
	 <p value>
		
		<script>
	

function deleteCategory()
{
	var e= document.getElementById("dropDown1");
	var var1 = e.options[e.selectedIndex].text;
	e.remove(e.selectedIndex);
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
	if (this.readyState == 4 && this.status == 200) {
		alert("q");
		$vari = "a";
			//console.log(xmlhttp.responseText); // 'This is the returned text.'
			document.getElementById("insert").innerHTML = xmlhttp.responseText;
		}
	};
	
	xmlhttp.open("GET", "deleteRow.php?q=" + var1 , true);
	xmlhttp.send();
 }
		
	
		
		function changeCategory()
		{
			var e= document.getElementById("dropDown1");
			var var1 = e.value;
			document.getElementById("insert").innerHTML = var1;
		
		}
		

		function alert()
		{
			alert "a";
		}

			
			
			
		
		
		
		</script>
		
		
*/		
?>		

</body>
</html>	 