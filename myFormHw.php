<?php
ini_set('display_errors',1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
function getName(){
        if(isset($_GET['name'])){
                echo "<p>hello, " . $_GET['name'] . "</p>";
        }
}
?>
<html>
<head></head>
<body><?php getName();?>
<form method="POST" action="#">
<input name="name" type="text" placeholder="enter your name"/>

<form action="/action_page.php">
<fieldset>
<legend>complete the form below:</legend>
username:<br>
<input type="text" name="username" value="vartika99">
<br>
password:<br>
<input type="password" name="password"/>
<br>confirm password:<br>
<input type="password" name="confirm"/>

<?php
if(isset($_POST['password']) && isset($_POST['confirm']))
{
        $password = $_POST['password'];
        $confirm = $_POST['confirm'];
        if($password == $confirm){
        echo "form completion successful";

}
else{
        echo "form completion not successful";

}
}
?>

<input type="submit" value="submit"/>
</form>
 </body>
</html>

<?php
if(isset($_POST)){
        echo "<br><pre>" . var_export($_GET, true) . "</pre><br>";
}
?>
