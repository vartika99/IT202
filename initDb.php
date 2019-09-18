<?php
require('config.php');

echo $host;
$conn_string = "mysql:host=$host;dbname=$database;charset=utf8mb4";

try{
	$db = new PDO($conn_string, $username, $password);
	echo " Connected";
	$query = "create table if not exists `TestUsers` (
                `id` int auto_increment not null,
                `username` varchar(30) not null unique,
                `pin` int default 0,
                PRIMARY KEY (`id`)
                ) CHARACTER SET utf8 COLLATE utf8_general_ci";
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
	$stmt = $db->prepare($query);
	print_r($stmt->errorInfo());
	$r = $stmt->execute();
	echo "<br>" . ($r>0?"Created table or already exists":"Failed to create table") . "<br>";
	unset($r);

	$insert_query = "INSERT INTO `TestUsers`( `username`, `pin`) VALUES ('JohnDoe', 1234)";
	$stmt = $db->prepare($insert_query);
	$r = $stmt->execute();

	echo "<br>" . ($r>0?"Insert successful":"Insert failed") . "<br>";
}
catch(Exception $e){
	echo $e->getMessage();
	exit("Something went wrong");
}
?>
