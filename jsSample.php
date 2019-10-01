<html>
<head>
<!-- css and js here -->
<script>
function pageLoaded(){

//alert("hello world");
var myVariable;
let myOtherVariable;
//myVariable = prompt("what's your name?");
//alert("hiii, " + myVariable);

let myNum = 0;
for(let i = 0; i < 10; i++){
	myNum += 0.1;
}
//alert("my num is 1: " + (myNum == 1) + "\nmy num: " + myNum);
console.log("my num is 1: " + (myNum == 1) + "\nmy num: " + myNum);

let myParagraph = document.getElementById("myParagraph");
console.log(myParagraph);

</script>
</head>

<body onload="pageLoaded();console.log('loaded');">
<!-- html content -->
<p id="myParagraph" >it loaded, yay!</p>
</body>
</html>
