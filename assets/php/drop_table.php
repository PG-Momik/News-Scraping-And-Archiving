<?php
include 'configure.php';
if(isset($_POST['drop-table-btn'])){
    
    $name=$_POST['drop-table-hidden-val'];
    $sql = "DROP TABLE ".$name;
    $result = mysqli_query($conn, $sql);
    header('Loaction:http://localhost/WebScraping/php/action_table.php');
}
?>