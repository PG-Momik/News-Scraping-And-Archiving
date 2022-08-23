<?php

include_once 'partials/configure.php';
include_once 'partials/sessionStart.php';
include_once 'partials/sessionVerification.php';
loadContact();

function loadContact(){?>

<!DOCTYPE html>
<html>
<head>
    <title>Contact Us</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" href="../css/mediaQueries.css">
</head>
<body>
<?php require_once 'partials/nav.php'?>
<section class="container container-fluid shadow-lg bordered pt-3">
    <h1>Meet the team</h1>
   <table class="table">
       <tbody>
       <tr class="align-middle text-light">
           <td>Momik Shrestha</td>
           <td>Back-end developer</td>
           <td><img style="width:100px; clip-path: circle()" src="https://i2.wp.com/awesomebyte.com/wp-content/uploads/2020/05/hide-the-pain-harold-image-1.jpg?resize=1080%2C1080&ssl=1"></td>
           <td><a href="mailto:webmaster@example.com" style="color: white; text-decoration: none; font-family: monospace">Reach by mail</a></td>
           <td><a href="https://www.instagram.com/fairly_local.0_0/" style="font-size: 32px; color: white"><i class="fa fa-instagram"></i></a></td>
       </tr>
       <tr class="align-middle text-light" >
           <td>Shreeju Pradhan</td>
           <td>Front-end developer</td>
           <td><img style="width:100px; clip-path: circle()" src="https://pbs.twimg.com/profile_images/474250534334255104/mExLV6FD_400x400.jpeg"></td>
           <td><a href="mailto:webmaster@example.com" style="color: white; text-decoration: none; font-family: monospace">Reach by mail</a></td>
           <td><a href="https://www.instagram.com/shreejupradhan/" style="font-size: 32px; color: white"><i class="fa fa-instagram"></i></a></td>
       </tr>

       </tbody>
   </table>
</section>
<?php require_once 'partials/footer.php'?>
<?php
}?>
