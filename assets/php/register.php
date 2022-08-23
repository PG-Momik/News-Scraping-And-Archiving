<?php

require_once 'partials/sessionStart.php';
require_once 'partials/sessionVerification.php';

$error_msg = array();
function validateUsername($username): ?string
{
    return is_numeric($username)?"Username cannot be numeric.":null;
}

function validatePhone($phone): ?string
{
    return strlen($phone) != 10 ? "Phone needs to be 10 digit" : null;
}

function validateEmail($email)
{
    filter_var($email, FILTER_VALIDATE_EMAIL)?null:"Enter valid email.";
}

function validatePasswords($password, $conPass): ?string
{
    return $password != $conPass ?"Password and Confirm password must be same.":null;
}

switch ($_SERVER['REQUEST_METHOD']) {
    case "GET":
        isset($_SESSION['isLogin'])?redirectDashboard():loadRegister();
        break;
    case "POST":
        $username = empty($_POST['username'])?$error_msg['username']="Username cannot be empty":$_POST['username'];
        $phone = empty($_POST['phone'])?$error_msg['phone']="Phone cannot be empty":$_POST['phone'];
        $email = empty($_POST['email'])?$error_msg['email']="Email cannot be empty":$_POST['email'];
        $password = empty($_POST['password'])?$error_msg['password']="Password cannot be empty":$_POST['password'];
        $conPass = empty($_POST['conPass'])?$error_msg['conPass']="Confirm password cannot be empty":$_POST['conPass'];
        if (!empty($error_msg)) {
            loadRegister($error_msg);
            return;
        }

        $error_msg['username'] = validateUsername($username);
        $error_msg['phone'] = validatePhone($phone);
        $error_msg['email'] = validateEmail($email);
        $error_msg['password'] = $error_msg['conPass'] = validatePasswords($password, $conPass);
        if ($error_msg['username'] !== null ||
            $error_msg['phone'] !== null ||
            $error_msg['email'] !== null ||
            $error_msg['password'] !== null ||
            $error_msg['conPass'] !== null) {
            loadRegister($error_msg);
            return;
        }

        require_once 'partials/configure.php';
        $sql = "Select id FROM users where phone = '$phone'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result)!=0) {
            $error_msg['phone'] = "Phone number already in use";
            loadRegister($error_msg);
            return;
        }

        $sql = "Select id FROM users where email = '$email'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result)!=0) {
            $error_msg['email'] = "Email already in use";
            loadRegister($error_msg);
            return;
        }
        // All Ok
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (username, email, phone, password, priority) 
                VALUES('$username','$email', '$phone', '$hash', 1)";
        if(mysqli_query($conn, $sql)){
            $_SESSION['msg'] = "Registration successful.";
            header("location:login.php");
            return;
        }

        break;
    default:
        echo "Invalid request made.";
        break;
}

function loadRegister($error_msg = '')
{
    ?>
<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" href="../css/mediaQueries.css">
</head>
<body>
<?php
require_once 'partials/nav.php' ?>
<section class="container-fluid mt-3" style="margin-bottom: 5vh">
    <div id="login-container" class="justify-content-center">
        <form action="" method="POST" class="col-lg-4 col-md-8 col-sm-12 mx-auto " id="registerForm">
            <h1 id="login-heading" class="col-lg-12">Join us.</h1>
            <div class="form-group col-lg-12 mb-1">
                <label for="username">Username</label>
                <?php
                if (isset($error_msg['username'])) { ?>
                    <input type="text" name="username" class="form-control is-invalid" id="username"
                           placeholder="">
                    <small class="form-text invalid-feedback"><?= $error_msg['username'] ?></small>
                    <?php
                } else { ?>
                    <input type="text" name="username" class="form-control " id="username"
                           placeholder="">
                    <small class="form-text text-muted">Feel free to choose a username.</small>
                    <?php
                } ?>
            </div>
            <div class="form-group col-lg-12 mb-1">
                <label for="phone">Phone</label>
                <?php
                if (isset($error_msg['phone'])) { ?>
                    <input type="text" name="phone" class="form-control is-invalid" id="phone"
                           placeholder=".">
                    <small class="form-text invalid-feedback"><?= $error_msg['phone'] ?></small>
                    <?php
                } else { ?>
                    <input type="text" name="phone" class="form-control " id="phone"
                           placeholder="">
                    <small class="form-text text-muted">We do not share your phone number.</small>
                    <?php
                } ?>
            </div>
            <div class="form-group col-lg-12 mb-1">
                <label for="email">Email</label>
                <?php
                if (isset($error_msg['email'])) { ?>
                    <input type="email" name="email" class="form-control is-invalid" id="email"
                           placeholder="">
                    <small class="form-text invalid-feedback"><?= $error_msg['email'] ?></small>
                    <?php
                } else { ?>
                    <input type="email" name="email" class="form-control " id="email"
                           placeholder="">
                    <small class="form-text text-muted">We do not share your email.</small>
                    <?php
                } ?>
            </div>
            <div class="form-group col-lg-12 mb-1">
                <label for="password">Password</label>
                <?php
                if (isset($error_msg['password'])) { ?>
                    <input type="password" name="password" class="form-control is-invalid" id="password"
                           placeholder="">
                    <small class="form-text invalid-feedback"><?= $error_msg['password'] ?></small>
                    <?php
                } else { ?>
                    <input type="password" name="password" class="form-control " id="password"
                           placeholder="">
                    <small class="form-text text-muted">8 digit password would be great.</small>
                    <?php
                } ?>
            </div>
            <div class="form-group col-lg-12 mb-1">
                <label for="conPassword">Confirm Password</label>
                <?php
                if (isset($error_msg['conPass'])) { ?>
                    <input type="password" name="conPass" class="form-control is-invalid" id="conPassword"
                           placeholder="">
                    <small class="form-text invalid-feedback"><?= $error_msg['conPass'] ?></small>
                    <?php
                } else { ?>
                    <input type="password" name="conPass" class="form-control " id="conPassword"
                           placeholder="">
                    <small class="form-text text-muted">Same 8 digit password as earlier.</small>
                    <?php
                } ?>
            </div>
            <br>
            <div class="form-group col-lg-12 mb-1">
                <input type="submit" name="registerBtn" id="" value="Register" class="btn btn-primary col-lg-12">
            </div>
            <div class="col-lg-12">
                <p class="redirectLink">Already registered?<a href="login.php">Click here.</a></p>
            </div>
        </form>
    </div>
</section>
</body>
<?php require_once 'partials/footer.php'?>

<?php }?>
