<?php

include_once 'partials/configure.php';
include_once 'partials/sessionStart.php';
include_once 'partials/sessionVerification.php';
loadAbout();

function loadAbout(){
?>

<!DOCTYPE html>
<html>
<head>
    <title>About Us</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" href="../css/mediaQueries.css">
</head>
<body>
<?php
require_once 'partials/nav.php' ?>
<section class="container container-fluid shadow p-3 bordered">
    <h1>About us</h1>
    <div class="row">
        <div class="col-lg-6">
            <h3><u>Who we are..</u></h3>
            <p class="justify-this">
                We are a small group of enthusiatic developers, experimenting something new. We are trying to making
                history by storing history.
                <br>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque labore maxime mollitia omnis quam repellat veniam. Alias animi dolorum exercitationem necessitatibus pariatur! A accusamus esse excepturi numquam, omnis recusandae. Dolorem.
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam cum fugiat laudantium magnam magni nesciunt non quas, quidem recusandae totam ullam ut voluptates. Aspernatur ex neque possimus sunt ut. Recusandae!
            </p>
        </div>
        <img class="col-lg-6 p-5"
             src="https://consequenceofsound.net/wp-content/uploads/2018/05/the-office-cast-photo-1.jpg?quality=80&w=807">
    </div>
    <hr>
    <div class="row">
        <img class="col-lg-6 p-5"
        src="https://images.indianexpress.com/2020/05/the-office-759.jpg">
        <div class="col-lg-6">
            <h3 class="text-end"><u>..What we do</u></h3>
            <p class="justify-this">
                We scrape nepali news portals, for example NepaliKhabar.com and NepalNews.com for valuable data. We are
                currently scrapping news sites and articles from these sites , we then store the data we scraped which
                we finally make public for users to view.
                <br>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab alias commodi cum nemo nostrum officiis quasi repellat tenetur unde voluptatum! Ab accusantium consequuntur culpa doloribus eius est ipsam quos tenetur!
            </p>
        </div>
    </div>
</section>
<?php
require_once 'partials/footer.php' ?>
<?php
} ?>
