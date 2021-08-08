<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error</title>
</head>
<body>
    <div id="error-msg">
        <p>
            Oops!something went wrong.
        </p>
    </div>
    <p>
        <?php
        // $_SESSION['priority'] = 0;
        include 'session_verification.php';
        if($_SESSION['priority']>0 || $_SESSION){
            echo "<a href='admin.php'>Click Here to go home</a>";
        }
        else{
            echo "<a href='index.php'>Click Here to go home</a>";
        }
        ?>
    </p>
</body>
</html>