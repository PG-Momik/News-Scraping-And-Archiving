<?php include "session_verification.php"?>
<!DOCTYPE html>
<html>
<head>
	<title>Contact us</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">	
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
                        <input type="checkbox" class="checkbox" id="chk" />
                        <label class="label" for="chk">
                            <div class="ball"></div>
                        </label>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link action" href="./././index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="aboutus.php">About us</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="contactus.php">Contact us</a>
                </li>
                <?php
                if((isset($_SESSION['username']) && $_SESSION['priority'] == 1)){
                echo '<li class="nav-item">';
                    echo '<a class="nav-link" href="admin.php">Dashboard</a>';
                echo '</li>';
                }
                ?>
                <?php if(isset($_SESSION['username']) ){?>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                    <?php }else{?>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Get Started</a>
                    </li>
			    <?php }?>
			</ul>
        </div>
    </nav> 
	<div class="container-fluid">
        <div class="row we-head">
            <h1> U've reached us </h1> 
        </div>
        <div class="table-wrapper">
            <div class="row row-head">
                <div class="col-md-1 col-2 info-head">S.N. </div>
                <div class="col-md-3 col-6 info-head">FullName </div>
                <div class="col-md-3 hide-in-mobile info-head"> Title</div>
                <div class="col-md-2 col-4 info-head">Photo</div>
                <div class="col-md-2 hide-in-mobile info-head"> Email</div>
                <div class="col-md-1 hide-in-mobile col-sm-4 info-head">Social </div>
            </div>
            <br> 
            <div class="row info-row" >
                <div class="col-md-1 col-2 info-data">1</div>
                <div class="col-md-3 col-6 info-data">Momik Shrestha</div>
                <div class="col-md-3 hide-in-mobile info-data">Back End developer</div>
                <div class="col-md-2 col-4 info-data"><img src="https://i2.wp.com/awesomebyte.com/wp-content/uploads/2020/05/hide-the-pain-harold-image-1.jpg?resize=1080%2C1080&ssl=1"></div>
                <div class="col-md-2 hide-in-mobile info-data"><a href="mailto:webmaster@example.com">Mail Me</a></div>
                <div class="col-md-1 hide-in-mobile info-data"><a href="https://www.instagram.com/fairly_local.0_0/"><i class="fa fa-instagram"></i></a></div>
            </div>
            <br>  
            <div class="row info-row" >
                <div class="col-md-1 col-2 info-data">2</div>
                <div class="col-md-3 col-6 info-data">Shreeju Pradhan</div>
                <div class="col-md-3 hide-in-mobile info-data">UI/UX developer</div>
                <div class="col-md-2 col-4 info-data"><img src="https://image.shutterstock.com/image-photo/closeup-portrait-yong-woman-casual-260nw-1554086789.jpg"></div>
                <div class="col-md-2 hide-in-mobile info-data"><a href="mailto:webmaster@example.com">Mail Me</a></div>
                <div class="col-md-1 hide-in-mobile info-data"><a href="https://www.instagram.com/shreejupradhan/"><i class="fa fa-instagram"></i></a></div>
            </div>
            <br>
            </div>
            <br>
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
<script src="../js/darkmode.js"></script>

</html>