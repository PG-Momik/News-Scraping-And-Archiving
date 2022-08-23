<?php
if(!isset($_GET['q'])){
    echo "Cannot access page.";
    return;
}

$id = $_GET['q'];
require_once 'partials/configure.php';
$sql = "DELETE FROM users WHERE id=$id";
if(mysqli_query($conn, $sql)){
   require_once 'partials/sessionStart.php';
   $_SESSION['success'] = "User deleted successfully.";
   header("location:dashboard.php");
}
