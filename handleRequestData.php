<?php
echo "<pre>" . var_export($_GET, true) . "</pre>";
if(isset($_GET['name'])){
	echo "<br>hello, " . $_GET['name'] . "<br>";
}
if(isset($_GET['number'])){
	$number = $_GET['number'];
	echo "<br>" . $number . " should be a number...";
	echo "<br>but it might not be<br>";
}

//HOMEWORK

//part 1
if(isset($_GET['number1']) && isset($_GET['number2'])){
	$number1 = $_GET['number1'];
	$number2 = $_GET['number2'];
}
if (is_numeric($number1) && number2){
	echo "<br>sum " . "is " . ($number1 + $number2);
}

//part 2
if(isset($_GET['param1'])){
	$param1 = $_GET['param1'];
	if(isset($_GET['param2'])){
		$param2 = $_GET['param2'];
		echo "<br>". $param1 . ' '. $param2;
	}
}

//part 3
if(isset($_GET['value'])){
	$value = $_GET['value'];
	echo "<br>" . $value;
}

//part 4
if(isset($_GET['char1'])){
	echo "<br>" . 'hi ' . htmlspecialchars($_GET["char1"]) . '! :)';
}
?>

