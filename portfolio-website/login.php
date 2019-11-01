<?php
ini_set('display_errors',1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function verifyLogin() {
    if(isset($_POST['username']) && isset($_POST['password'])) {
        $login_username = $_POST['username'];
        require("config.php");
        $db = new PDO($conn_string, $username, $password);
        $select_query = "select password from `LoginPage` where username=:username";
        $db->prepare($select_query);
        $stmt->bindParam(':username', $login_username);
        $stmt->execute();
        $response = $stmt->fetch();
    }
    if($password == $response['password']) {
        echo "successful login";
    }
    else {
        echo "invalid username/password";
    }    
}

?>
<!DOCTYPE html>
<html>
<head>

<style>
input { border: 1px solid black; }
.error {border: 1px solid red;}
.noerror {border: 1px solid black;}
</style>

<form method="POST" action="#" onsubmit="return verifyLogin();">
username: <input name="name" type="text" required/> <br> <br>
password: <input type="password" name="password" required/> <br> <br>
<input type="submit" value="login"/>

<?php
    if(isset($response)) {
        echo $response;
    }
?>

</form>
</body>
</html>
