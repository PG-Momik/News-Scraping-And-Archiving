<?php
if(isset($_POST['Delete'])){
    $index = $_POST['index-identifier'];
    include 'configure.php';
    $sql = "DELETE from newsinfotabel WHERE id = '$index' ";
    if ($conn->query($sql) === TRUE) {
        header('Location:http://localhost/loginpage/action_scraper.php');
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