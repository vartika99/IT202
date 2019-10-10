<!DOCTYPE html>
<?php
ini_set('display_errors',1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<html>
<head>
<script>
function validate(){
var form = document.forms[0];
        var password = form.password.value;
        var conf = form.confirm.value;
        console.log(password);
        console.log(conf);
        let pv = document.getElementById("validation.password");
        let succeeded = true;
var email = form.email.value;
        var ev = document.getElementById("validation.email");
        if(email.indexOf('@') > -1){
                ev.style.display = "none";
        }
        else{
                ev.style.display = "block";
                ev.innerText = "Please enter a valid email address";
                succeeded = false;
        }
</script>
</head>
<body>
<input name="email" type="email" placeholder="name@example.com"/>
<span id="validation.email" style="display:none;"></span>
</script>
</head>
<body>
</html>
<?php
if(isset($_POST)){
        echo "<br><pre>" . var_export($_POST, true) . "</pre><br>";
}
