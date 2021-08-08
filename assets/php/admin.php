<?php
    include 'session_verification.php';
    if(($_SESSION['priority'])<1){
        header("Location:http://localhost/loginpage/error.php");
    }
    else{
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="finalcss.css">	
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
                    <a class="nav-link action" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="aboutus.php">About us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contactus.php">Contact us</a>
                </li>
                <?php
                if((isset($_SESSION['username']) && $_SESSION['priority'] == 1)){
                echo '<li class="nav-item active">';
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
    <div id="admin-container">
        <div id="admin-controls-heading">
            <div id="back-btn"><i class="fa fa-arrow-left aria-hidden="true"></i></div>
            <div><h1>Admin Controls</h1></div>
        </div>
        <div id="dashboard-wrapper">
            <div class="admin-controls menu" id="menu-1"><p>Handle Scraper</p></div>
            <div class="admin-controls sub-menu hidden"><p><a href="add.php">Add Scraper</a></p></div>
            <div class="admin-controls sub-menu hidden"><p><a href="action_scraper.php">Manage Scraper</a></p></div>
            <div class="admin-controls menu"><p><a href="action_user.php">Handle Users</a></p></div>
            <div class="admin-controls menu"><p><a href="view.php">Handle Data</a></p></div>
            <div class="admin-controls menu"><p><a href="action_table.php">Handle Tables</a></p></div>
        </div>
    </div>
</div>
<?php include 'footer.php';?>
</body>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="admin_control.js"></script>
    <script src="darkmode.js"></script>
</html>
<?php }?>