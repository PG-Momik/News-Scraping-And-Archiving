<?php
include "session_verification.php";
if(($_SESSION['priority'])<1){
    header("Location:http://localhost/WebScraping/php/error.php");
}
else{
include "configure.php";
//to select tables;
$sql = "SHOW TABLES";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0){
    // output data of each row
    $i = 0;
    // Looping through the results
    while($row = mysqli_fetch_assoc($result)) {
        $table_names[$i] = array(
            'name' => $row['Tables_in_mydbxx'],
        );
        $i++;  
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table Control</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">	
</head>
<body>
    <?php include "../php/partials/navigation.php"?>
    <div class="container-fluid">
        <h1 align="center">Manage Tables</h1>
        <div id="table-control-container">
        <table border="2px" align="center">
        <tr class="table-control-row table-control-row-head">
            <th class="table-control-row-col">SN</th>
            <th class="table-control-row-col">Name</th>
            <th class="table-control-row-col">Action</th>
        </tr>
        <?php foreach($table_names as $index => $table_name){
            $index++;
            echo "<tr class='table-control-row'>";
            echo "<td class='table-control-row-col'>".$index."</td>";
            echo "<td class='table-control-row-col'>".$table_name['name']."</td>";
            echo "<td>";
            echo "<form action ='drop_table.php' method='POST'>";
            echo "<input type='hidden'  name='drop-table-hidden-val' value ='".$table_name['name']."'>"; 
            echo "<button type='submit' class='delete-user-admin btn-link' name='drop-table-btn'>Delete</button>";
            echo "</form>";
            echo "</td>";
        echo "</tr>";
        }
        ?>
        </table>
        </div>
    </div>
</body>
<footer class="footer-class" id="footer-id">
    <div class="row">
        <div class="footer-content col-md-6 col-sm-12">
            <h2 class="footer-heading">Find us at:</h2>
            <ul class="socials">
                <li>
                    <a href="#"><i class="fa fa-facebook footer-icon"></i></a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-twitter footer-icon"></i></a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-google footer-icon"></i></a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-youtube footer-icon"></i></a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-linkedin-square footer-icon"></i></a>
                </li>
            </ul>
        </div>
        <div class="footer-content col-md-6 col-sm-12">
                <h2 class="footer-heading">Address:</h2>
                <div class="address">
                <ul>
                    <li><i class="fa fa-map-marker" aria-hidden="true"></i>KhasiBazar,Kirtipur Ring Road, Kathmandu</li>
                    <li><i class="fa fa-map-marker" aria-hidden="true"></i>Bhotebal,Teku, Kathmandu</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row footer-bottom">
        <div class="col">
            <p">copyright &copy;2021 ourcode. designed by <u>ME.<u></p>
        </div>
    </div>
</footer>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="../js/darkmode.js"></script>
</html>
<?php }?>