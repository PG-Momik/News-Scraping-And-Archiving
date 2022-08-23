<?php

switch ($_SERVER["REQUEST_METHOD"]) {
    case "GET":
        $queryString = $_SERVER["QUERY_STRING"];
        if (strlen($queryString) == 0) {
            echo "<pre>";
            var_dump($_SERVER);
            echo "</pre>";
            echo "Cannot access page. GOTO <a href='../../index.php'>HOME</a>.";
            return;
        }
        $items = explode('&', $queryString);
        $id = $items[0][3];
        $en = $items[1][3];

        $article = "article" . $en;
        $title = "title" . $en;

        require_once 'partials/configure.php';

        $sql = "SELECT 
                date,
                time,
                $article article, 
                $title title 
                FROM data WHERE 
                id = $id ";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            extract($row);
            loadArticle($date, $time, $title, $article);
        }
        break;
    default:
        echo "Cannot access page. GOTO <a href='../../index.php'>HOME</a>.";
        break;
}


function loadArticle($date, $time, string $title, string $article)
{
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Results</title>
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="../css/style.css">
        <link rel="stylesheet" href="../css/mediaQueries.css">
    </head>
    <body>
    <?php
    require_once 'partials/nav.php' ?>
    <?php
    require_once 'partials/smallSearch.php' ?>
    <section>
        <div class="container container-fluid">
            <div class="jumbotron">
                <h1><?= $title ?></h1>
                <small><i class="fa fa-clock-o"></i> <?= $date ?> </small>
                <br>
                <small><i class="fa fa-calendar-o"></i> <?= $time ?> </small>
                <br>
                <div class="mt-2">
                    <?= $article ?>
                </div>
            </div>
        </div>
    </section>
    </body>
    <?php
    require_once 'partials/footer.php' ?>
    </html>
    <?php
} ?>


<a href="partials/logout.php">Logout</a>
