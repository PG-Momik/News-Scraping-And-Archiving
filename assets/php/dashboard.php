<?php

include_once 'partials/configure.php';
include_once 'partials/sessionStart.php';
include_once 'partials/sessionVerification.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['addUser'])) {
        $uname = $_POST['uname'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $priority = $_POST['priority'];
        $hash = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (username, phone, email, password, priority) VALUES ('$uname', '$phone', '$email', '$hash', '$priority')";
        if (mysqli_query($conn, $sql)) {
            $_SESSION['success'] = "User added successfully.";
        } else {
            echo "Something went wrong. Try again.";
        }
    } elseif (isset($_POST['addMeta'])) {
        $name = $_POST['name'];
        $url = $_POST['url'];
        $title = $_POST['title'];
        $article = $_POST['article'];
        $link = $_POST['link'];

        $sql = "INSERT INTO metadata (name, url, title_class, article_class, article_link_class) VALUES ('$name', '$url', '$title', '$article', '$link')";
        if (mysqli_query($conn, $sql)) {
            $_SESSION['success'] = "User added successfully.";
        } else {
            echo "Something went wrong. Try again.";
        }
    } else {
        echo "Cannot access page.";
        return;
    }
}
if($_SESSION['isAdmin']){
    loadDashboard();
}

function loadDashboard()
{
    ?>

    <!DOCTYPE html>
    <html>
    <head>
        <title>Dashboard</title>
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="../css/style.css">
        <link rel="stylesheet" href="../css/mediaQueries.css">
    </head>
    <body>
    <?php
    require_once 'partials/nav.php' ?>
    <section class="grid-container container container-fluid mt-4">
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card bordered shadow">
                    <div class="card-body">
                        <h5 class="card-title">Users</h5>
                        <p class="card-text">Manage normal user data.</p>
                        <button id="userBtn" class="btn btn-dark px-4" onclick="fetchUser(0)">Manage</button>
                        <button id="addUserBtn" class="btn btn-outline-success mx-1 px-4" onclick="renderForm('user')">
                            New
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card bordered shadow">
                    <div class="card-body">
                        <h5 class="card-title">Metadata</h5>
                        <p class="card-text">Manage scraper metadata.</p>
                        <button id="scraperBtn" class="btn btn-dark px-4" onclick="fetchMetaData()">Manage</button>
                        <button id="addMetaBtn" class="btn btn-outline-success mx-1 px-4" onclick="renderForm('meta')">
                            New
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 mb-4">
                <div class="card bordered shadow">
                    <div class="card-body">
                        <h5 class="card-title">News Data</h5>
                        <p class="card-text">Manage scraped data.</p>
                        <button id="newsBtn" class="btn btn-dark px-4" onclick="fetchData()">Manage</button>
                    </div>
                </div>
            </div>
        </div>
        <?php
        if (isset($_SESSION['success'])) {
            echo "<div class='alert alert-success'>" . $_SESSION['success'] . "</div>";
            unset($_SESSION['success']);
        } ?>
        <div id="playground" class="grid-container container container-fluid mt-4 text-center">
            <small>---Tables will be displayed here.---</small>
        </div>
    </section>
    </body>
    <script src="../js/ajaxFunctions.js"></script>
    </html>
    <?php
} ?>
