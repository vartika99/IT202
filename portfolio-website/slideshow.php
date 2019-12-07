<!DOCTYPE html>
<html>
<h3> V&V Portfolio </h3>
<header>
    <nav> <center>
        <a href="home.php">Home</a>
    </nav> </center> <br>
</header>

<body> <center>
    <img class="slides" src="alyssa.jpg" style="width:30%">
    <img class="slides" src="flower.jpg" style="width:45%">
    <img class="slides" src="beach.jpg" style="width:45%">
    <img class="slides" src="butterfly.jpg" style="width:30%">
    <img class="slides" src="self.jpg" style="width:30%">

    <button class="displayLeft" onclick="plusDivs(-1)">&#10094;</button>
    <button class="displayRight" onclick="plusDivs(+1)">&#10095;</button>

</body> </center>

<script>
    var slideNum = 1;
    showDivs(slideNum);

    function plusDivs(n) {
        showDivs(slideNum += n);
    }

    function showDivs(n) {
        var i;
        var x = document.getElementsByClassName("slides");
        if (n > x.length) {slideNum = 1} 
        if (n < 1) {slideNum = x.length};
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none"; 
        }
        x[slideNum-1].style.display = "block"; 
    }
</script>

</html>
