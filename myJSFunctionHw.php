<html>
<head>
<script>
function isEmpty(v){
 return (v.trim().length == 0);
}

function isEmail(inputEle){
	if(inputEle.type == "email"){
		return inputEle.value.indexOf('@') > -1;
	}

	return true;

}
function myValidation(inputEle, emailValidation){
	var isValid = true;
    if(emailValidation.length > 0) {
        let other = document.forms[0][emailValidation]
        let email = inputEle.value;
        let emailconf = other.value;
        if (isEmpty(email)) {
            isValid = false;
            console.log("email cannot be empty");
        }
	if (isEmpty(emailconf)) {
            isValid = false;
            console.log("email confirmation cannot be empty");
        }

        if (email != emailconf) {
            isValid = false;
            console.log("emails do not match");
	    alert("emails don't match");
        }
        if (!isEmail(inputEle)) {
            isValid = false;
            console.log("invalid email in the first field");
        }
        if (!isEmail(other)) {
            isValid = false;
            console.log("invalid email in the second field");
        }
    }
    else {
        let v = inputEle.value;
        if (isEmpty(v)) {
            isValid = false;
            console.log("value is empty (else)");
	   
        }
        if (!isEmail(inputEle)) {
            isValid = false;
            console.log("input is not valid email (else)");
            alert("input is not a valid email");

        }
    }
}

function isPass(inputpass){
	if(inputEle.type == ""){
	}

    return true;
}

function myPassValidation(inputPass, passValidation){
	var isValid = true;
    if(passValidation.length > 0) {
        let other = document.forms[0][passValidation]
        let pass = inputPass.value;
        let passconf = other.value;
        if (isEmpty(pass)) {
            isValid = false;
            console.log("password cannot be empty");        
        }
        if (isEmpty(passconf)) {
            isValid = false;
            console.log("confirm password cannot be empty");        
        }
        if (pass != passconf) {
            isValid = false;
            console.log("passwords do not match");
            alert("passwords don't match");
        }
        if (!isPass(inputPass)) {
            isValid = false;
            console.log("invalid password in the first field");
        }
        if (!isPass(other)) {
            isValid = false;
            console.log("invalid password in the second field");
        }
    }
    else {
        let v = inputPass.value;
        if (isEmpty(v)) {
            isValid = false;
            console.log("value is empty (else)");
            alert("password field can't be empty");
        }
        if (!isPass(inputPass)) {
            isValid = false;
            console.log("input is not a valid password (else)");
            alert("input is not a valid password");
        }
    }
}

function isUser(inputUser){
	if(inputUser.type == ""){
	
	}

    return true;
}

function myUserValidation(inputUser, userValidation){
	var isValid = true;
    if(userValidation.length > 0) {
        let other = document.forms[0][userValidation]
        let user = inputuser.value;
        if (isEmpty(user)) {
            isValid = false;
            console.log("username field cannot be empty");
        }        
        if (!isUser(inputUser)) {
            isValid = false;
            console.log("invalid username in the field");
        }
    }
    else {
        let v = inputUser.value;
        if (isEmpty(v)) {
            isValid = false;
            console.log("value is empty (else)");
            alert("username field can't be empty");
        }
        if (!isUser(inputUser)) {
            isValid = false;
            console.log("input is not a valid username (else)");
            alert("input is not a valid username");
        }
    }
}

</script>
</head>

<body>
<form onsubmit="return false;">
<input type="text" name="username" placeholder="username"

        onchange="myUserValidation(this, '');"/>
<input type="email" name="email" placeholder="email"
	onchange="myValidation(this, '');"
/>
<input type="email" name="confirmemail" placeholder="confirm email"
	onchange="myValidation(this,'email');"/>
<input type="password" name="password" placeholder="password"
	onchange="myPassValidation(this, '');" />
<input type="password" name="confirmpassword" placeholder="confirm password"
	onchange="myPassValidation(this, 'password');"/>
<input type="submit" value="submit"/>
</form>
</body>
</html>
