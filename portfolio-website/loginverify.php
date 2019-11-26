<?php
ini_set('display_errors',1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function verifyLogin() {

    if(isset($_POST['username']) && isset($_POST['password'])) {
      try {
          $username = $_POST['username'];
	  require("config.php");
          $connection_string = 'mysql:dbname=vbp42;host=sql1.njit.edu';
          $db = new PDO($connection_string, 'vbp42', 'ki4QEZ5zm');
          $select_query = "select password from `LoginPage` where username=:username";
          $stmt = $db->prepare($select_query);
          $stmt->bindParam(':username', $username);
          $stmt->execute();
          $response = $stmt->fetch(PDO::ASSOC);

      }
      catch(PDOException $e) {
        echo "ERROR" + $e->getMessage();
      }
    if($_POST['password'] == $response['password']) {
      echo "successful login";
    }
    else {
      echo "invalid username/password";
    } 
    
  }
}

    

if(isset($_POST['submit']))
{
   verifyLogin();
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

<form method="POST" action="login.php">
username: <input name="username" type="text" required/> <br> <br>
password: <input type="password" name="password" required/> <br> <br>
<input type="submit" value="login" name="submit"/>

<?php
    if(isset($response)) {
        return($response);
    }
?>

</form>
</body>
</html>
