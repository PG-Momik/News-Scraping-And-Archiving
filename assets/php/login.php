<?php
if(isset($_POST['login'])){
    $phone = $_POST['phone-no'];
    $pword = $_POST['password'];
    if(empty($phone) && !(empty($paword))){
        $error_msg1 =  "Phone number cannot be empty.";
        $error_msg2 ="";
        $error_msg3 ="";   
    }
    elseif((!(empty($phone)) && (empty($pword)))){
        $error_msg2 =  "Password cannot be empty.";
        $error_msg1 ="";
        $error_msg3 ="";
    }
    elseif(empty($phone) && empty($pword)){
        $error_msg3 =  "Fill in required fields.";
        $error_msg1 ="";
        $error_msg2 ="";
    }
    else{
        if(!(is_numeric($phone))){
            if(!(is_numeric($phone)) && strlen($phone)!=10){
                $error_msg1 =  "Phone number must be 10 digit number.";
                $error_msg2 ="";
                $error_msg3 ="";
            }
            else{
                $error_msg1 =  "Phone number must contain numbers.";
                $error_msg2 ="";
                $error_msg3 ="";
            }
        }
        elseif((is_numeric($phone)) && strlen($phone)!=10){
            $error_msg1 =  "Phone number must be 10 digits long.";
            $error_msg2 ="";
            $error_msg3 ="";
        }
        elseif((is_numeric($phone)) && strlen($phone)==10){
            $a = $phone[0];
            $b = $phone[1];
            if($a!=9 && $b!=8){
                $error_msg1 =  "Phone number must start with (98).";
                $error_msg2 ="";
                $error_msg3 ="";
            }
            else{
                $error_msg1 ="";
                $error_msg2 ="";
                $error_msg3 ="";
                include 'configure.php';
                $hash = password_hash($pword, PASSWORD_DEFAULT);
                $sql = "SELECT * FROM userdata WHERE phone = '$phone'";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0){
                    $i = 0;
                    while($row = mysqli_fetch_assoc($result)) {
                    $datas[$i] = array(
                        "id" => $row['id'],
                        "fullname" => $row['fullname'],
                        "email" => $row['email'],
                        "phone" => $row['phone'],
                        "password" => $row['password'],
                        "priority" => $row['priority'],
                        );
                    $i++;
                    }
                    if(password_verify($pword, $datas[0]['password'])){
                        if($datas[0]['priority'] == 1){
                            session_start();
                            $_SESSION['username'] = $datas[0]['fullname'];
                            $_SESSION['priority'] = $datas[0]['priority']; 
                            header("Location:admin.php");
                        }
                        else{
                            session_start();
                            $_SESSION['username'] = $datas[0]['fullname'];
                            $_SESSION['priority'] = $datas[0]['priority']; 
                            header("Location:index.php");
                        }
                    }
                    mysqli_close($conn);
                }
                else{
                    $error_msg3 = "Your account does not exist.";
                    $error_msg1 = "";
                    $error_msg2 = "";
                }
            }
        }
    }
}
else{
    $error_msg1="";
    $error_msg2="";
    $error_msg3="";
}
?>
<?php include 'session_verification.php'?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="finalcss.css">
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
                    <li class="nav-item active">
                        <a class="nav-link" href="login.php">Get Started</a>
                    </li>
			    <?php }?>
			</ul>
        </div>
    </nav>   
    <div class="container-fluid">
        <h1 id="login-heading">Welcome</h1>
        <div id="login-container">
            <form action="" method="POST">
                <div id="phone-row" class="login-form-elements">
                <p id="error3" class="error"><?=$error_msg3?></p>
                    <label for="l-phoneno">Phone Number</label>
                    <input type="text" name="phone-no" id="l-phoneno" class="input-ho-yo">
                    <input type="hidden" name="hidden-value-1" id="hidden-value-1">
                    <p id="error1" class="error"><?=$error_msg1?></p>
                    </div>
                <div id="password-row" class="login-form-elements">
                    <label for="l-password">Password</label>
                    <input type="password" name="password" id="l-password" class="input-ho-yo">
                    <input type="hidden" name="hidden-password" id="hidden-password">
                    <p id="error2" class="error"><?=$error_msg2?></p>
                </div>
                <div id="btn-div" class="login-form-elements">
                    <button type="submit" id="login-btn" name="login">Login</button>
                </div>
            </form>
            <p class="more-info">New Here?<a href="register.php">Click here.</a></p>
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
<script src="darkmode.js"></script>
</html>
