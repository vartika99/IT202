<?php
ini_set('display_errors',1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
function checkPasswords(){
        if(isset($_POST['password']) && isset($_POST['confirm'])){
                if($_POST['password'] == $_POST['confirm']){
                        echo "<br>Passwords Matched!<br>";
                }
                else{
                        echo "<br>Passwords didn't match!<br>";
                }
        }
}
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

        if(password == conf){
                pv.style.display = "none";
                form.confirm.className= "noerror";
        }
        else {
                pv.style.display = "block";
                pv.innerText = "Passwords don't match";
                //form.confirm.focus();
                form.confirm.className = "error";
                //form.confirm.style = "border: 1px solid red;";
                succeeded = false;
        }
        
	var email = form.email.value;
        var ev = document.getElementById("validation.email");
        var eConfirm = form.eConfirm.value
        console.log(email);
        console.log(eConfirm);


        
        if(email == "" || eConfirm == "") {
                ev.style.display = 'block';
                ev.innerText = "please enter an email address";
                succeeded = false;
        }
        else {
                ev.style.display = "none";
                form.eConfirm.className = "noerror"
	}

        if(email.indexOf('@') > -1){
                ev.style.display = "none";
        }
        else {
		ev.style.display = "block";
                ev.innerText = "please enter a valid email address";
                succeeded = false;
        }

        if(email == eConfirm) {
                ev.style.display = 'none';
        }
        else {
                ev.style.display = 'block';
                ev.innerText = "emails do not match. please verify your email again";
                form.confirm.className = "error";
                succeeded = false;
        }

 //check if the username field is empty or not
        var username = form.username.value;
        var uv = document.getElementById("validation.username");
        console.log(username);
        if(username == "") {
                uv.style.display = 'block';
                uv.innerText = "username field cannot be empty. please enter a  username";
                succeeded false;
        }
        else {
                uv.style.display = 'none';
        }
        return succeeded;
}
</script>
<style>
input { border: 1px solid black; }
.error {border: 1px solid red;}
.noerror {border: 1px solid black;}
</style>
</head>

<body>
<div style="margin-left: 50%; margin-right:50%;">
<form method="POST" action="#" onsubmit="return validate();">
<input username="username" type="text" placeholder="enter a username"/>
<span style="display:none;" id="validation.username"></span>

<input name="email" type="email" placeholder="name@example.com"/>
<input name="eConfirm" type="email" placeholder="confirm email"/>
<span id="validation.email" style="display:none;"></span>

<input type="password" name="password" placeholder="enter a password"/>
<input type="password" name="confirm" placeholder="re-enter your password"/>
<span style="display:none;" id="validation.password"></span>

<!-- Add dropdown element (something specific to your project) -->
<input type="submit" value="submit"
	onsubmit= "validate(); return CheckPasswords()"/>
</form>
</div>
</body>
</html>
<?php checkPasswords();?>
<?php
if(isset($_POST)){
        echo "<br><pre>" . var_export($_POST, true) . "</pre><br>";
}
?>


