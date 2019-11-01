<?php
ini_set('display_errors',1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function verifyLogin() {
        if(isset($_POST['username']) && isset($_POST['password'])) {
        $login_username = $_POST['username'];
        require("config.php");
	$conn_string = "mysql:host=$host;dbname=$database;charset=utf8mb4";
        $db = new PDO($conn_string, $host, $database, $username, $password);
        $select_query = "select password from `LoginPage` where username=:username";
        $stmt = $db->prepare($select_query);
        $stmt->bindParam(':username', $login_username);
        $stmt->execute();
	print_r($stmt->errorInfo());
        $response = $stmt->fetch(PDO::ASSOC);
	if($_POST['password'] == $response['password']) {
        	echo "successful login";
    }
	else {
        	echo "invalid username/password";
    }

    }
}

?>
<!DOCTYPE html>
<html>
<head>

<body>
	<h2>V&V Portfolio</h2>
</body>

<style>
input { border: 1px solid black; }
.error {border: 1px solid red;}
.noerror {border: 1px solid black;}
</style>

<form method="POST" action="#">
username: <input name="name" type="text" required/> <br> <br>
password: <input type="password" name="password" required/> <br> <br>
<input type="submit" value="login"/>
</form>

<?php
    verifyLogin();
?>

</body>
</html>
