<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<html>
<head>
<script>
    function verifyPass(form) {
        let verified = form.password.value == form.confirm.value;
        if(!verified) {
            alert ("passwords don't match");
        }
        return verified
    }
</script>
</html>
<?php
    if(isset($_POST['username']) 
    && isset($_POST['password'])
    && isset($_POST['confirm'])) {

    $user = $_POST['username'];
    $pass = $_POST['password'];
    $confirm = $_POST['confirm'];

    if($pass != $confirm){
            echo "passwords don't match";
            exit();
    }
    try{
        //do hash of password
        $hash = password_hash($pass, PASSWORD_BCRYPT);
        require("config.php");
        //$username, $password, $host, $database
        $conn_string = "mysql:host=$host;dbname=$database;charset=utf8mb4";
        $db = new PDO($conn_string, $username, $password);
        $stmt = $db->prepare("INSERT into `LoginPage` (`username`, `password`) VALUES(:username, :password)");
        $result = $stmt->execute(
            array(":username"=>$user,
                ":password"=>$hash
            )
        );
        print_r($stmt->errorInfo());
        echo var_export($result, true);
    }
    catch(Exception $e){
        echo $e->getMessage();
    }
}
?>

</script>
   <center> <h2> Welcome to V&V Portfolio! </h2> </center>

<style>
input { border: 1px solid black; }
.error {border: 1px solid red;}
.noerror {border: 1px solid black;}
</style>

</head>

<center> <body bgcolor="#e3def8">
	<header>
		<nav>
			<a href="https://web.njit.edu/~vbp39/IT-202/IT202/portfolio-website/registration.php">Register</a>
                	<a href="https://web.njit.edu/~vbp42/IT202/portfolio-website/loginhash.php">Login</a> <br> <br>
                </nav>
        </header>
        <div id="register">
                <form method="POST" onsubmit="return validate();">
                username: <br> <input name="username" type="text" required/> <br>
                email: <br> <input name="email" type="email" required/> <br>
                password: <br> <input type="password" name="password" required/> <br>
                confirm password: <br> <input type="password" name="confirm" required/>
                <span style="display:none;" id="validation.password"></span> <br> <br>

                <input type="submit" value="Register"/>
                </form>
        </div>
</body> </center>
</html>
