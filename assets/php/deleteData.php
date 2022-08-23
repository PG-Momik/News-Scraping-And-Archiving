<?php
if(!isset($_GET['q'])){
    echo "Cannot access page.";
    return;
}

$id = $_GET['q'];
require_once 'partials/configure.php';
$sql = "DELETE FROM data WHERE id=$id";
if(mysqli_query($conn, $sql)){
    require_once 'partials/sessionStart.php';
    $_SESSION['success'] = "News data deleted successfully.";
    header("location:dashboard.php");
}
