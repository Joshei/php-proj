<html>
<body>

<?php

//error_reporting(-1);

//error_log("1script was called, processing request...");

		$host = 'localhost';
		$user = 'root';
		$pass = '';
		$database = 'ecommerce';

		$options = array(
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
			PDO::ATTR_EMULATE_PREPARES => false
		);

		//error_log("2script was called, processing request...");
		$dbo = new PDO("mysql:host=$host;dbname=$database", $user, $pass, $options);
		
		//for sending to javascript in adminmainpage.php
		echo "test";

		//error_log("3script was called, processing request...");
		$q = $_REQUEST["q"];
		$q4 = "DELETE FROM categories WHERE categories.Title = '$q'";
		
		$dbo->exec($q4);
		
?>

</body>
</html>