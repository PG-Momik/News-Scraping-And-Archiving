<?php
    include 'session_verification.php';
    include 'configure.php';
    if(isset($_POST['Update']) &&
    isset($_POST['id']) && 
    isset($_POST['name']) && 
    isset($_POST['email']) && 
    isset($_POST['phone']) && 
    isset($_POST['priority'])){
            $id = $_POST['id'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $priority = $_POST['priority'];
            $sql = " UPDATE userdata SET 
                fullname = '$name', 
                email = '$email', 
                phone = '$phone',  
                priority = '$priority' WHERE id = '$id'";
            $result = mysqli_query($conn, $sql);
            header('Location:http://localhost/loginpage/action_user.php');
            }
    else{
        header('Location:http://localhost/loginpage/error.php');
    }
    mysqli_close($conn);
?>