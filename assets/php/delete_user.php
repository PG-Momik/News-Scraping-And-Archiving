<?php
if(isset($_POST['delete-user'])){
    $id = $_POST['hidden-value'];
    include 'configure.php';
    $sql = "DELETE from userdata WHERE id = '$id' ";
    if ($conn->query($sql) === TRUE) {
        header('Location:http://localhost/WebScraping/php/action_user.php');
    } else {
        echo "Error deleting record: " . $conn->error;
        echo "</br>";
        echo "<a href='action_scraper.php' class='click-here'>Go Back</a>";
    }
}
else{
    include "error.php";
}
?>