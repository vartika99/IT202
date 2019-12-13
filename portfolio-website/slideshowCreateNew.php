<!DOCTYPE html>
<html>
<h3> V&V Portfolio </h3>
<header>
    <nav> <center>
        <a href="home.php">Home</a>
        <a href="createnew.html">Back to Portfolio</a>
    </nav> </center> <br>
</header>

<body> <center>
    <img class="slides" src="images/lany.jpg" style="width:45%">
    <img class="slides" src="images/tree.jpg" style="width:45%">

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
