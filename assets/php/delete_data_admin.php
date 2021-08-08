<?php
    include 'session_verification.php';
    include 'configure.php';
    if(isset($_POST['delete-value-user'])){
        $id = $_POST['hidden-value-user'];
        $sql = "DELETE FROM datatable WHERE SN= '$id'";
        $result = mysqli_query($conn, $sql);
        header('LOCATION:http://localhost/loginpage/view.php');
    }
?>