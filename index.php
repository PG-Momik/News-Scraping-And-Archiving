<?php include 'assets/php/session_verification.php';?>
<!DOCTYPE html>
<html>
<head>
	<title>Index</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">	
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light nav-container">
        <a id="navbar-brand" href="#">Hello <?=$uname;?></a>
        <button class="navbar-toggler" id='navbar-toggler' type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
		</button>
        <div class="navbar-collapse collapse show " id="navbarSupportedContent">
            <ul class="navbar-nav ml-lg-auto">
                <li>
                    <div>
                        <input type="checkbox" class="checkbox" id="chk">
                        <label class="label" for="chk">
                            <div class="ball"></div>
                        </label>
                    </div>
                </li>
                <li class="nav-item active">
                    <a class="nav-link action" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="assets/php/aboutus.php">About us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="assets/php/contactus.php">Contact us</a>
                </li>
                <?php
                if((isset($_SESSION['username']) && $_SESSION['priority'] == 1)){
                echo '<li class="nav-item">';
                    echo '<a class="nav-link" href="assets/php/admin.php">Dashboard</a>';
                echo '</li>';
                }
                ?>
                <?php if(isset($_SESSION['username']) ){?>
                    <li class="nav-item">
                        <a class="nav-link" href="assets/php/logout.php">Logout</a>
                    </li>
                    <?php }else{?>
                    <li class="nav-item">
                        <a class="nav-link" href="assets/php/login.php">Get Started</a>
                    </li>
			    <?php }?>
			</ul>
        </div>
    </nav>   
    <div class="container-fluid" >
        <div  class="search-container">
            <div class="row">
                <h1 id="heading">Let's start</h1>
            </div>
            <div class="row">
                <div class="col-6" id="time"><h4>Time</h4>
                    <p><span id="samaya"></span></p>
                </div>
                <div class="col-6" id = 'weather'>
                    <h4>Weather in KTM</h4>
                    <div id ='weather-block' class="hidden">
                        <p>
                            Status: <span id="status"></span>
                        <br>
                            Feels like: <span id="feels_like"></span>°C
                        </p>
                    </div>
                </div>
            </div>
            <div class="search-wrapper">
                    <form class="row form-design" name="form-design" action="assets/php/view.php" method="POST">
                        <div class="col"><input type="search" id="main-search" name="search" placeholder=" Seach by date (YYYY-MM-DD)" required></div>
                        <div class="col" id="jyalemaju"><input type="submit" id="main-submit" name="submit" value="Find"></div>
                    </form>
            </div>
        </div>  
    </div>             
<footer class="footer-class" id="footer-id">
    <div class="row">
        <div class="footer-content col-md-6 col-sm-12">
            <h2 class="footer-heading">Find us at:</h2>
            <ul class="socials">
                <li>
                    <a href="#"><i class="fa fa-facebook footer-icon"></i></a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-twitter footer-icon"></i></a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-google footer-icon"></i></a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-youtube footer-icon"></i></a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-linkedin-square footer-icon"></i></a>
                </li>
            </ul>
        </div>
        <div class="footer-content col-md-6 col-sm-12">
                <h2 class="footer-heading">Address:</h2>
                <div class="address">
                <ul>
                    <li><i class="fa fa-map-marker" aria-hidden="true"></i>KhasiBazar,Kirtipur Ring Road, Kathmandu</li>
                    <li><i class="fa fa-map-marker" aria-hidden="true"></i>Bhotebal,Teku, Kathmandu</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row footer-bottom">
        <div class="col">
            <p">copyright &copy;2021 ourcode. designed by <u>ME.<u></p>
        </div>
    </div>
</footer>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="assets/js/darkmode.js"></script>
<script src="assets/js/weather.js"></script>
<style>
    #main-search{
        margin-right:50px;
    }
    #main-submit{
        margin-left: 100px;

    }
</style>
</html>
