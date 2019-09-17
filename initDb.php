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
	$stmt = $db->prepare($query);
	$r = $stmt->execute();
	echo "<br>" . $r . "<br>";
}
catch(Exception $e){
	echo $e->getMessage();
	exit("Something went wrong");
}
?>
