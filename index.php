<?php

include_once 'assets/php/partials/sessionStart.php';
include_once 'assets/php/partials/sessionVerification.php' ?>

<!DOCTYPE html>
<html>
<head>
    <title>Index</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/mediaQueries.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark justify-content-between px-5">
    <a class="navbar-brand" href="#">Hello <?= $_SESSION['username'] ?? ""; ?></a>
    <div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="assets/php/about.php">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="assets/php/contact.php">Contact Us</a>
                </li>
                <?php
                if (!isset($_SESSION['isLogin'])) {
                    echo "<li class='nav-item'>";
                    echo "<a class='nav-link' href='assets/php/login.php'>Login</a>";
                    echo "</li>";
                } else {
                    if ($_SESSION['priority'] > 1) {
                        echo "<li class='nav-item'>";
                        echo "<a class='nav-link' href='assets/php/dashboard.php'>Dashboard</a>";
                        echo "</li>";
                    }
                    echo "<li class='nav-item'>";
                    echo "<a class='nav-link' href='assets/php/partials/logout.php'>Logout</a>";
                    echo "</li>";
                }
                ?>
            </ul>
        </div>
    </div>
</nav>
<section class="container container-fluid shadow-lg pt-5 bordered">
    <div class="row">
        <div class="col-lg-6 text-center">
            <h4>Date</h4>
            <p><i class="fa fa-calendar-o" aria-hidden="true"></i> <span id="date"></span></p>
            <h4>Time</h4>
            <p><i class="fa fa-clock-o" aria-hidden="true"></i> <span id="time"></span></p>
        </div>
        <div class="col-lg-6 text-center">
            <h4>Weather in KTM</h4>
            <p class="mt-3">
                <i class="fa fa-sun-o" aria-hidden="true"></i> Status: <span id="status"></span>
                <br>
                <i class="fa fa-thermometer-half" aria-hidden="true"></i> Feels like: <span id="feelsLike"></span>°C
            </p>
        </div>
    </div>
    <div class="mt-4">
        <form action="assets/php/view.php" method="GET" id="search-form" class="row justify-content-center">
            <?php
            if (isset($_SESSION['msg'])) {
                $message = $_SESSION['msg'];
                unset($_SESSION['msg']);
                echo "<div class='alert alert-success'>$message</div>";
            }
            ?>
            <input type="text" name="date" id="search-left" class="col-lg-9 col-md-8 mb-2" placeholder="Look up dates here.">
            <button type="submit" id="search-right" class="col-lg-3 col-md-4 mb-2 search-btn">
                <i class="fa fa-search" aria-hidden="true"></i>
                Search
            </button>
        </form>
    </div>
</section>
<footer class="footer-class" id="footer-id">
    <div class="row footer-row">
        <div class="col-md-6 col-sm-12">
            <h3 class="">Find us at:</h3>
            <ul class="find-us-at" style="">
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
        <div class="col-md-6 col-sm-12">
            <h3 class="">Address:</h3>
            <div class="">
                <ul class="address">
                    <li><i class="fa fa-map-marker" aria-hidden="true"></i>KhasiBazar, Kirtipur, Kathmandu</li>
                    <li><i class="fa fa-map-marker" aria-hidden="true"></i>Bhotebal, Teku, Kathmandu</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row copyright-bar">
        <div class="col">
            <p">Copyright &copy;2021. Designed by <u>Shreeju Pradhan</u>.</p>
        </div>
    </div>
</footer>

<script src="assets/js/weather.js"></script>