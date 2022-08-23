<?php

if (!isset($_GET['q'])) {
    if(isset($_POST)){
        $id = $_POST['id'];
        $priority = $_POST['priority'];
        $uname = $_POST['username'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        require_once 'partials/sessionStart.php';
        require_once 'partials/configure.php';
        $sql = "UPDATE users SET priority = '$priority', username = '$uname', phone = '$phone', email = '$email' WHERE id = '$id'";
        if(mysqli_query($conn, $sql)){
            $_SESSION['success'] = "User updated successfully.";
            header("location:dashboard.php");
        }
        echo "Something went wrong.Please try again.";
        return;
    }
    echo "Cannot access page.";
    return;
}


require_once 'partials/configure.php';

$id = $_GET['q'];
$sql = "SELECT id, username, email, phone, priority FROM users WHERE id = $id LIMIT 1";
$result = mysqli_query($conn, $sql);

if (!$result) {
    echo "Something went wrong. Please try again.";
    return;
}
while ($row = mysqli_fetch_assoc($result)) {
    extract($row);
    loadView($id, $username, $email, $phone, $priority);
}
function loadView($id, $username, $email, $phone, $priority)
{ ?>

    <!DOCTYPE html>
    <html>
    <head>
        <title>Results</title>
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="../css/style.css">
        <link rel="stylesheet" href="../css/mediaQueries.css">
    </head>
    <body>
    <?php
    require_once 'partials/nav.php' ?>
    <form method="POST" action="singleUser.php" class="col-lg-4 container container-fluid mt-5 border-lg">
        <div class="row">
            <div class="form-group col-lg-6 mb-3">
                <label for="id">ID</label>
                <input type="email" class="form-control" id="id" aria-describedby="" name ="id" value="<?= $id; ?>" readonly>
            </div>
            <div class="form-group col-lg-6 mb-3">
                <label for="priority">Priority</label>
<!--                <input type="email" class="form-control" id="id" aria-describedby="" value="--><?//= $priority; ?><!--">-->
                <select name="priority" id="priority"  class="form-control">
                    <option readonly=""><?=$priority." (current)"?></option>
                    <option>1</option>
                    <option>2</option>
                </select>
            </div>
        </div>
        <div class="form-group mb-3">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username" value="<?=$username?>">
        </div>
        <div class="form-group mb-3">
            <label for="phone">Phone Number</label>
            <input type="text" class="form-control" id="username" name="phone" value="<?=$phone?>">
        </div>
        <div class="form-group mb-3">
            <label for="email">Email</label>
            <input type="text" class="form-control" id="username" name="email" value="<?=$email?>">
        </div>
        <div class="text-center">
            <button class="col-lg-6 btn btn-primary" type="submit">Update</button>
        </div>
    </form>

    </body>
    <?php
    require_once 'partials/footer.php' ?>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
    <script src="../js/bootstrap.min.js"></script>
    </html>
    <?php
} ?>

