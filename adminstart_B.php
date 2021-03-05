<html>
<body>
<script>
alert("a");
</script>
<?php
//consider something called injection
if($_POST['id1'] == "") 
{
	header("Location: http://www.localhost/myecommerceproj/login.php"); 
}
else
{
	
}
	 
 
	//redirect back

if($_POST['password'] == "") 
{
	header("Location: http://www.localhost/myecommerceproj/login.php"); 
}
else
{
	
}

$id = $_POST['id1'];
$password = $_POST['password'];

$host = 'localhost';
$user = 'root';
$pass = '';
$database = 'ecommerce';

$options = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_EMULATE_PREPARES => false
);

$dbo = new PDO("mysql:host=$host;dbname=$database", $user, $pass, $options);

$q1 = 'SELECT * FROM customers Where customers.CustomerID =';
$q1 .= "'";
$q1 .= $id;
$q1 .= "'";



foreach ($dbo->query($q1) as $row) {

if($row['Password'] == $password)
{

echo "Logged in!";
}
else
{
 
 header("Location: http://www.localhost/myecommerceproj/login.php"); 
}
}
?>


</body>
</html>
