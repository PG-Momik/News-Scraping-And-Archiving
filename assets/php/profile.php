<?php
require_once 'partials/sessionStart.php';
require_once 'partials/sessionVerification.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" href="../css/mediaQueries.css">

</head>
<body>
<?php require_once 'partials/nav.php'?>
<section class="grid-container">
    <div class="grid-left">
        <ul>
            <li><a href="#" class="nav-link">ABC</a></li>
            <li><a href="#" class="nav-link">CDE</a></li>
            <li><a href="#" class="nav-link">EFG</a></li>
            <li><a href="#" class="nav-link">HIJ</a></li>
        </ul>
    </div>
    <div class="grid-right">
        Welcome Admin
    </div>
</section>
<style>
    .grid-container{
        display: grid;
        grid-template-columns: 15% 85%;
        background-color: #2196F3;
        grid-gap: 10px;
    }
    .grid-left{
        background: #272727;
    }
</style>
</body>
</html>
