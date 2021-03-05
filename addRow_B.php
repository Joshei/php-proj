<html>
<body>

<?php

	
	 
	 echo "aaa";
	 $var1 = $_POST["category"];
	 
	 //insert category to database
	 if ((isset ($_POST['category'] )) &&
	 ($_POST['category'] != ""))
	 {
		$host = 'localhost';
		$user = 'root';
		$pass = '';
		$database = 'ecommerce';

		$options = array(
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
			PDO::ATTR_EMULATE_PREPARES => false
		);

		$var1 = $_POST["category"];$dbo = new PDO("mysql:host=$host;dbname=$database", $user, $pass, $options);
		
		//$var1 = $_POST['category'];
		//change this to session variable that holds current customer ID
		$sql = "INSERT INTO categories (Title, CustomerID) VALUES ('$var1','1') ";
		
		echo $sql;
		
		$dbo->exec($sql);
		//$dbo->exec($sq2);
		
		
		
		header("Location: http://www.localhost//ecom/adminmainpage.php"); 
		
		}
?>
</body>
</html>