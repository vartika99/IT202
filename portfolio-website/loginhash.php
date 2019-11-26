<?php
ini_set('display_errors',1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

function verifyLogin() {
        if(isset($_POST['username']) && isset($_POST['password'])) {
		$login_username = $_POST['username'];
		$pass = $_POST['password'];
        	require("config.php");
		$conn_string = "mysql:host=$host;dbname=$database;charset=utf8mb4";
        	$db = new PDO($conn_string, $username, $password);
        	$select_query = "select username, password from `LoginPage` where username=:username";
        	$stmt = $db->prepare($select_query);
        	$stmt->bindParam(':username', $login_username);
        	$stmt->execute();
		//print_r($stmt->errorInfo());
		$response = $stmt->fetch(PDO::FETCH_ASSOC);
            
            	if($response && count($response) > 0){
				//$hash = password_hash($pass, PASSWORD_BCRYPT);
				if(password_verify($pass, $response['password'])){
					echo "Welcome, " . $response['username'];
                                        echo "[" . $response['username'] . "]";
					$login_username = array("username"=> $response['username']);
					$_SESSION["user"]["username"] = $login_username;
					//echo var_export($login_username, true);
					//echo var_export($_SESSION, true);
					header("Location: home.php");

                		}

                echo "hello, " . var_export($_POST['username'], true);
            }

                else {
                        echo "invalid username/password";
                }
        }
}
?>
<!DOCTYPE html>
<html>
<center> <body bgcolor="#e3def8">
        <h2>Welcome to V&V Portfolio!</h2>

        <header>
    <nav>
        <a href="registration.php">Register</a>
        <a href="loginhash.php">Login</a> <br> <br>
    </nav>
        </header>

<style>
input { border: 1px solid black; }
.error {border: 1px solid red;}
.noerror {border: 1px solid black;}
</style>

<form method="POST">
username: <br> <input name="username" type="text" required/> <br>
password: <br> <input type="password" name="password" required/> <br> <br>
<input type="submit" value="login"/>
</form>

<?php
    verifyLogin();
?>
</body> </center>
</html>
