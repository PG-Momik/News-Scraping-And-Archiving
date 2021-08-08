<?php
    include 'session_verification.php';
    if(($_SESSION['priority'])<1){
        header("Location:http://localhost/WebScraping/php/error.php");
    }
    else{
?>

<!DOCTYPE html>
<html>
<head>
	<title>User Controls</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">	
</head>
<body>
    <?php include 'partials/navigation.php';?>
    <div class="container-fluid">
        <h1 align="center">User Controls</h1>
        <div class="user-wrapper">
        <div id="action-user" class="row user-info-row">
            <div class="col">Sn</div>
            <div class="col">Name</div>
            <div class="col">Type</div>
            <div class="col">Action</div>
        </div>
        <?php
            include 'configure.php';
            $sql = "SELECT * from userdata";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result)>0){
                $i = 0;
                while($row = mysqli_fetch_assoc($result)){
                    $users[$i] = array(
                        'id' => $row['id'],
                        'fullname' => $row['fullname'],
                        'priority' => $row['priority'],
                    );
                    $i++;
                }
            }
            if(!(empty($users))){foreach($users as $index => $user){
                    $index++;
            ?>
            <div class="row user-info-row">
                <div class="col"><?=$index?></div>
                <div class="col"><?=$user['fullname'];?></div>
                <div class="col"><?=$user['priority'];?></div>
                <div class="col user-action-up-del">
                    <form action="update_user.php" method="POST">
                    <input type='hidden' name='hidden-value' value=<?=$user['id']?>>
                    <button type='submit' name='update-user' class='update-user-btn btn-link' style='border:none;'>Update</button>
                    </form>
                    <form action="delete_user.php" method="POST">
                    <input type='hidden' name='hidden-value' value=<?=$user['id']?>>
                    <button type='submit' name='delete-user' class='delete-user-btn btn-link' style='border:none;'>Delete</button>
                    </form>
                </div>
            </div>
            <?php
              }
            }
        ?>
        </div>
    </div>
    <?php include 'footer.php'?>
    </body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="darkmode.js"></script></html>
<?php }?>