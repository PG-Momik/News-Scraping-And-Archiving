
<?php
    if(isset($_POST['update-user'])){
    $index = $_POST['hidden-value'];
    include 'configure.php';
    $sql = "SELECT * from userdata where id = '$index'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
        $i = 0;
        while($row = mysqli_fetch_assoc($result)){
            $datas[$i] = array(
                'id' => $row['id'],
                'name' => $row['fullname'],
                'email' => $row['email'],
                'phone' => $row['phone'],
                'priority' =>$row['priority'],
            );
            $i++;  
        }
    }      
mysqli_close($conn);       
}    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Scraper</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">	

</head>
<body>
<?php include 'session_verification.php'?>
<?php include 'partials/navigation.php'?>
<br>
<div class="container-fluid">
<div id="update-container" style="width:50%">
    <h1>Update User</h1>
    <form action="updater_user.php" method="POST">
    <div class="row">
            <label for="id" class="col">SN</label>
            <input type="text" class="col" value='<?=$datas[0]['id'];?>' name="id" required readonly>
        </div>
        <div class="row">
            <label for="name" class="col">Name</label>
            <input type="text" class="col" value='<?=$datas[0]['name'];?>' name="name" required>
        </div>
        
        <div class="row">
            <label for="email" class="col">EMAIL</label>
            <input type="email" class="col" value='<?=$datas[0]['email'];?>' name="email" required>
        </div>
        
        <div class="row">
            <label for="phone" class="col">Phone Number</label>
            <input type="text" class="col" value='<?=$datas[0]['phone'];?>' name="phone" required>
        </div>
        
        <div class="row">
            <label for="priority" class="col">Priority</label>
            <input type="text" class="col" value='<?=$datas[0]['priority'];?>' name="priority" required>
        </div>
        <div class="row">
            <div class="col-4">
                <input type="submit" value="update" class="btn btn-primary" name="Update">
            </div>
        </div>
    </form>
</div>
</div>
<?php include 'partials/footer.php'?>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="../js/darkmode.js"></script>
</html>