<?php

declare(strict_types=1);

require_once 'partials/sessionStart.php';
require_once 'partials/sessionVerification.php';

function redirectDashboard(): void
{
    header('location:../../index.php');
    return;
}

function validatePhone($phone): ?string
{
    return strlen($phone) != 10 ? "Phone needs to be 10 digit" : null;
}

function validatePassword($password): ?string
{
    return strlen($password) < 3 ? "Phone needs to be at least 3 characters." : null;
}

function verifyPhone($phone, $dbPhone): ?string
{
    return $phone != $dbPhone ? "Phone number doesn't exist." : null;
}

function verifyPassword($password, $dbPassword): ?string
{
    return password_verify($password, $dbPassword) ? "Invalid password" : null;
}

$error_msg = array();
switch ($_SERVER['REQUEST_METHOD']) {
    case "GET":
        isset($_SESSION["isLogin"]) ? redirectDashboard() : loadLogin();
        break;
    case "POST":
        isset($_SESSION['isLogin']) ? redirectDashboard() : null;

        /*
         * (1) Check for empty field.
         * (2) Validate fields.
         * (3) Fetch data from db.
         * (4) Verify fields.
         * (5) Set session and redirect.
         */

        //(1)
        $phone = empty($_POST["phone"]) ? $error_msg['phone'] = "Phone cannot be empty." : $_POST["phone"];
        $password = empty($_POST['password']) ? $error_msg['password'] = "Password cannot be empty" : $_POST["password"];
        if (!empty($error_msg)) {
            loadLogin($error_msg);
            return;
        }

        //(2)
        $error_msg['phone'] = validatePhone($phone);
        $error_msg['password'] = validatePassword($password);
        if ($error_msg['phone'] !== null || $error_msg['password'] !== null) {
            loadLogin($error_msg);
            return;
        }

        //(3)
        require_once 'partials/configure.php';
        $sql = "SELECT * FROM users WHERE phone  = $phone LIMIT 1";
        $result = mysqli_query($conn, $sql);

        if (!$result) {
            $error_msg['phone'] = "User doesn't exist.";
            loadLogin($error_msg);
            return;
        }
        while ($row = mysqli_fetch_assoc($result)) {
            //(4)
            $error_msg['phone'] = verifyPhone($phone, $row['phone']);
            $error_msg['password'] = verifyPassword($password, $row['password']);

            if ($error_msg['phone'] !== null || $error_msg['password'] !== null) {
                loadLogin($error_msg);
                return;
            }
            //(5)

            $_SESSION['username'] = $row['username'];
            $_SESSION['isLogin'] = true;
            $_SESSION['priority'] = $row['priority'];
            if ($_SESSION['priority'] == 1) {
                $_SESSION['msg'] = "Login successful.";
                header('location:../../index.php');
                return;
            }
            $_SESSION['isAdmin'] = true;
            redirectDashboard();
        }

        break;
    default:
        echo "Invalid request made.";
        break;
}


function loadLogin($error_msg = '')
{
    ?>
    <!DOCTYPE html>
    <html>
        <head>
            <title>Login</title>
            <link rel="stylesheet" href="../css/bootstrap.min.css">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
            <link rel="stylesheet" type="text/css" href="../css/style.css">
            <link rel="stylesheet" href="../css/mediaQueries.css">
        </head>
    <body>
<?php
require_once 'partials/nav.php' ?>
<section class="container-fluid mt-3">
    <div id="login-container" class="justify-content-center">
        <form action="" method="POST" class="col-lg-4 col-md-8 col-sm-12 mx-auto" id="loginForm">
            <h1 id="login-heading" class="col-lg-12">Welcome back</h1>
            <?php
            if(isset($_SESSION['msg'])){
                echo "<div class='alert alert-success'>".$_SESSION['msg']."</div>";
                unset($_SESSION['msg']);
            }?>

            <div class="form-group col-lg-12">
                <label for="phoneField">Phone</label>
                <?php
                if (isset($error_msg['phone'])) { ?>
                    <input type="text" name="phone" class="form-control is-invalid" id="phoneField"
                           placeholder="Phone number here.">
                    <small class="form-text invalid-feedback"><?= $error_msg['phone'] ?></small>
                    <?php
                } else { ?>
                    <input type="text" name="phone" class="form-control " id="phoneField"
                           placeholder="Phone number here.">
                    <small class="form-text text-muted">We do not share your phone number.</small>
                    <?php
                } ?>
            </div>
            <div class="form-group col-lg-12">
                <label for="passwordField">Password</label>
                <?php
                if (isset($error_msg['password'])) { ?>
                    <input type="password" name="password" class="form-control is-invalid" id="passwordField"
                           placeholder="Password here.">
                    <small class="form-text invalid-feedback"><?= $error_msg['password'] ?></small>
                    <?php
                } else {
                    ?>
                    <input type="password" name="password" class="form-control" id="passwordField"
                           placeholder="Password here.">
                    <small class="form-text text-muted">Passwords are encrypted.</small>
                    <?php
                } ?>
            </div>
            <br>

            <div class="form-group col-lg-12 mb-1">
                <input type="submit" name="loginBtn" id="" value="Login" class="btn btn-primary col-lg-12">
            </div>
            <div class="col-lg-12">
                <p class="redirectLink">New Here?<a href="register.php" >Click here.</a></p>
            </div>
        </form>
        <br>
    </div>
</section>

</body>
    <?php require_once 'partials/footer.php'?>
    <?php
}

?>