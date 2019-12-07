<?php
session_start();
?>

<!DOCTYPE html>
<html>
<script>
function queryParam(){
        var params = new URLSearchParams(location.search);
        if(params.has('page')){
            var page = params.get('page');
            var ele = document.getElementById(page);
            if(ele){
                let portfolio = document.getElementById('portfolio');
                let about = document.getElementById('about');
                portfolio.style.display="none";
		about.style.display="none";
                ele.style.display = "block";
            }
        }
        else{
            let portfolio = document.getElementById('portfolio');
            portfolio.style.display = "block";
        }
    }
</script>

<h3> V&V Portfolio <h3>

<body>
Welcome back, <?php echo $_SESSION["user"]["username"];?>
</body>

<body onload="queryParam();">
    <header>
        <nav> <center>
            <a href="?page=portfolio">Portfolio</a>
            <a href="?page=about">About Us</a>
            <a href="createnew.html">Create New Portfolio </a>
            <a href="slideshow.php">View as Slideshow </a>
        </nav>
    </header> <br>


    <div id="portfolio">
        <center> <img src="alyssa.jpg" alt="alyssa" style="width:45%"> </center>
        <br>
        <center> <img src="flower.jpg" alt="flower" style="width:45%"> </center>
        <br>
        <center> <img src="beach.jpg" alt="beach" style="width:45%"> </center>
        <br>
        <center> <img src="butterfly.jpg" alt="butterfly" style="width:45%"> </center>
        <br>
        <center> <img src="self.jpg" alt="self portrait" style="width:45%"> </center>
        <br>
        <h5> Pictures courtesy of Alyssa Noelle. </h5>
    </div>

    <div id="about" style="display:none">
<h3> About us. </h3>
        <h4> What is V&V Portfolio? </h4>
        <p> V&V Portfolio is a website that is a part of a school project.
        <br> It was created by two undergraduate students. </p>

        <h4> Why was it created? </h4>
        <p> V&V Portfolio was created to allow students/and or young adults to create their portfolios easily. 
        <br> A user can create multiple portfolios per account. </p>

        <h3> Contact us. </h3>
        If you have any questions, comments, or concerns, please email us at v_vportfolio@email.com.        
    </div>
</body>
</html>
