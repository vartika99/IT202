<?php
#turn error reporting on
ini_set('display_errors',1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require('config.php');
echo "Loaded Host: " . $host;

$conn_string = "mysql:host=$host;dbname=$database;charset=utf8mb4";

try{
	$db = new PDO($conn_string, $username, $password);
	echo "Connected";
	$query = "create table if not exists `LoginPage` (
		`username` varchar(20) not null unique,
		`password` varchar(15) not null,
		) CHARACTER SET utf8 COLLATE utf8_general_ci";

	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
	$stmt = $db->prepare($query);
	print_r($stmt->errorInfo());
	$r = $stmt->execute();
	echo "<br>" . ($r>0?"created table already exists":"failed to create table") . "<br>";
	unset($r);
}

catch(Exception $e){
	echo $e->getMessage();
	exit("Something went wrong");
}
?>
