<?php
include "configure.php";
if($_POST){
	$full_name = $_POST['full-name'];
	$email = $_POST['email'];
	$phone = $_POST['phoneno'];
	$password = $_POST['password'];
	$con_password = $_POST['confirm-password'];
	//name verification
	if(empty($full_name)){
		$error1 = "Cannot Be Empty.";
	}
	else{
		// check if name only contains letters and whitespace
		if(!preg_match("/^[a-zA-Z-' ]*$/",$full_name)) {
		  $error1 = "Invalid Name.";
		}
		else{
			$error1 = "";
		}
	}
	//email verification
	if(empty($email)){
		$error2 = "Email is required.";
	} 
	else{
		// check if e-mail address is well-formed
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		  $error2 = "Invalid email format.";
		}
		else{
			$error2="";
		}
	}
	//phone verification
	if(empty($phone)){
		$error3="Phone is required.";
	}
	else{
		if(!is_numeric($phone) || (strlen($phone)<10 || strlen($phone)>10)){
			$error3 = "Phone must be 10 digit number.";
		}
		else{
			$a = $phone[0];
			$b = $phone[1];
			if($a!=9 && $b!=8){
				$error3 = "Invalid Phone number";
			}
			else{
				$error3 = "";
			}
		}
	}
	//password and con verification
	if(empty($password)){
		$error4 = "Password required.";
	}
	else{
		$error4 = "";
	}
	if(empty($con_password)){
		
		$error5 = "Confirm Password required.";
	}
	else{
		if($password!=$con_password){
			$error4 = "Password must be same.";
			$error5 = "Confirm Password must be same.";
		}
		else{
			$error4 = "";
			$error5 = "";
		}
	}
	$acc_check = "";
	// password hash
	if($error1 == "" && $error2 == "" && $error3 == "" && $error4 == "" && $error5 == ""){
		$hash1 = password_hash($password, PASSWORD_DEFAULT);
		$sql = "SELECT * from userdata where phone  = $phone";
		$result = mysqli_query($conn, $sql);
		$count  = mysqli_fetch_assoc($result);
		if($count > 0){ 
		$acc_check = "Account Already Exists.";
		}
		else{
			$sql2 = "INSERT into userdata (fullname, email, phone, password) VALUES ('$full_name','$email','$phone','$hash1')";
			if(mysqli_query($conn, $sql2)){
				header('Location:http://localhost/loginpage/login.php');
			}
		}
	}
	//if errors
	//sql
}
else{
	$error1="";
	$error2="";
	$error3="";
	$error4="";
	$error5="";
	$acc_check="";
}


?>
<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
</head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="finalcss.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light nav-container">
        <a id="navbar-brand" href="#">Hello</a>
        <button class="navbar-toggler" id='navbar-toggler' type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
		</button>
        <div class="navbar-collapse collapse show " id="navbarSupportedContent">
            <ul class="navbar-nav ml-lg-auto">
                <li class="nav-item">
                    <a class="nav-link action" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="aboutus.php">About us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contactus.php">Contact us</a>
                </li>
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
	<h1 id="register-heading">Join Us</h1>
	<p class="error account-check"><?=$acc_check?></p>
		<!-- this is for registration -->
		<div id="register-container">
			<form action="register.php" method="POST">
				<div id="r-div-fname" class="sub-cont">
					<label for="full-name">
						Full name: <span class="error"><?=$error1?></span>
					</label>
					<input type="text" name="full-name"  class="input-ho-yo" id="full-name">
				</div>
				<div id="r-div-email" class="sub-cont">
					<label for="email">
						Email:<span class="error"><?=$error2?></span>
					</label>
					<input type="email" name="email"  class="input-ho-yo"id="email">
				</div>
				<div id="r-div-phoneno" class="sub-cont">
					<label for="phoneno">
						Phone no:<span class="error"><?=$error3?></span>
					</label>
					<input type="text" name="phoneno"  class="input-ho-yo" id="phoneno">
				</div>
				<div id="r-div-password" class="sub-cont">
					<label for="password">
						Password:<span class="error"><?=$error4?></span>
					</label>
					<input type="password" name="password"  class="input-ho-yo" id="password">
				</div>
				<div id="r-div-cpassword" class="sub-cont">
					<label for="confirm-password">
						Confirm password:<span class="error"><?=$error5?></span>
					</label>
				<input type="password" name="confirm-password"  class="input-ho-yo" id="confirm-password">
				</div>
				<div id="r-div-btn" class="sub-cont">
					<input type="submit" name="submit-btn" id="register-btn" class="btn" value="Register">
				</div>
			</form>
			<div class="more-info" id="to-register">
				Already one of us?<a id="r-toggle-garne" href="login.php">Click here.</a>
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
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>

<?php
mysqli_close($conn);
?>
