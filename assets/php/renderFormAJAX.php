<?php

if (!isset($_POST)) {
    return;
}
$formType = $_POST['formType'];
function renderUserForm()
{
    echo <<<EOF
    <form action="dashboard.php" method="POST" class="row text-start">
        <div class="col-lg-4 mx-auto" id="userForm">
            <div class="form-group mb-1">
                <label for="">Username</label>
                <input type="text" name="uname" id="" class="form-control">
            </div>
            <div class="form-group mb-1">
                <label for="">Phone</label>
                <input type="text" name="phone" id="" pattern="[0-9]{10}" class="form-control">
            </div>       
            <div class="form-group mb-1">
                <label for="">Email</label>
                <input type="email" name="email" id="" class="form-control">
            </div>  
            <div class="form-group mb-1">
                <label for="">Password</label>
                <input type="password" name="password" id="" class="form-control">
            </div>
            <div class="form-group mb-3">
                <label for="">Priority</label>
                <select class="form-control" name="priority">
                    <option readonly>Select Priority</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                </select>
            </div>
            <div class="form-group mb-2 row col-lg-8 mx-auto">
                <input type="submit" name="addUser" value="Add User" class="btn btn-success">
            </div>
        </div>
    </form>
EOF;
}

function userMetaForm()
{
    echo <<<EOF
<form action="dashboard.php" method="POST" class="row text-start">
        <div class="col-lg-4 mx-auto"  id="userForm">
            <div class="form-group mb-1">
                <label for="">Site Name</label>
                <input type="text" name="name" id="" class="form-control">
            </div>
            <div class="form-group mb-1">
                <label for="">URL</label>
                <input type="url" name="url" id="" class="form-control">
            </div>       
            <div class="form-group mb-1">
                <label for="">Title Class</label>
                <input type="text" name="title" id="" class="form-control">
            </div>  
            <div class="form-group mb-1">
                <label for="">Article Class</label>
                <input type="text" name="article" id="" class="form-control">
            </div>
            <div class="form-group mb-3">
                <label for="">Article Link Class</label>
                <input type="text" name="link" id="" class="form-control">
            </div>
            <div class="form-group mb-2 row col-lg-8 mx-auto">
                <input type="submit" name="addMeta" value="Add params" class="btn btn-success">
            </div>
        </div>
    </form>
EOF;
}

switch ($formType) {
    case "user":
        renderUserForm();
        break;
    case "meta":
        userMetaForm();
        break;
    default:
        echo "Invalid action. Try again.";
        break;
}