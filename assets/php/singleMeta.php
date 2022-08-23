<?php

if (!isset($_GET['q'])) {
    if (isset($_POST)) {
        $id = $_POST['id'];
        $url = $_POST['url'];
        $title = $_POST['title'];
        $article = $_POST['article'];
        $link = $_POST['link'];
        require_once 'partials/configure.php';
        require_once 'partials/sessionStart.php';
        $sql = "UPDATE metadata SET url = '$url', title_class ='$title', article_class ='$article', article_link_class='$link' WHERE id = '$id'";
        if (mysqli_query($conn, $sql)) {
            $_SESSION['success'] = "Metadata updated successfully.";
            $conn->close();
            header("location:dashboard.php");
        }
        echo "Something went wrong.Please try again.";
        return;
    }
    echo "Cannot access page.";
    return;
}

require_once 'partials/configure.php';

$id = $_GET['q'];
$sql = "SELECT * FROM metadata WHERE id = $id LIMIT 1";
$result = mysqli_query($conn, $sql);

if (!$result) {
    echo "Something went wrong. Please try again.";
    return;
}

while ($row = mysqli_fetch_assoc($result)) {
    extract($row);
    loadView($id, $name, $url, $title_class, $article_class, $article_link_class);
}
function loadView($id, $name, $url, $title, $article, $link)
{ ?>
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
<form method="POST" action="singleMeta.php" class="col-lg-4 container container-fluid mt-5 border-lg">
    <div class="form-group mb-3">
        <label for="id">ID</label>
        <input type="text" class="form-control" id="id" name="id" value="<?= $id?>" readonly>
    </div>
    <div class="form-group mb-3">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name" value="<?=$name?>">
    </div>
    <div class="form-group mb-3">
        <label for="url">URL</label>
        <input type="text" class="form-control" id="url" name="url" value="<?=$url?>">
    </div>
    <div class="form-group mb-3">
        <label for="title">Title Class</label>
        <input type="text" class="form-control" id="title" name="title" value="<?=$title?>">
    </div>
    <div class="form-group mb-3">
        <label for="article">Article Class</label>
        <input type="text" class="form-control" id="article" name="article" value="<?=$article?>">
    </div>
    <div class="form-group mb-3">
        <label for="link">Article Link Class</label>
        <input type="text" class="form-control" id="link" name="link" value="<?=$link?>">
    </div>
    <div class="text-center">
        <button class="col-lg-6 btn btn-primary" type="submit">Update</button>
    </div>
</form>
</body>
<?php
require_once 'partials/footer.php' ?>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="../js/bootstrap.min.js"></script>
</html>
    <?php
} ?>