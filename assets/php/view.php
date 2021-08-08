<?php
    include 'session_verification.php';
    include 'configure.php';
    if(isset($_POST['submit']) && isset($_POST['search'])){
        $min_date = "2020-02-21";
        $max_date = date("Y-m-d") ; 
        $date = $_POST['search'];
        if((strlen($date))!=10){
            $error = "ENTER PROPER DATE FORMAT.";
        }
        else{
            if($date>=$min_date && $date<=$max_date){
                $sql  = "SELECT * from datatable where date = '$date'";
                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result) > 0){
                    $i = 0;
                    while($row = mysqli_fetch_assoc($result)) {
                    $datas[$i] = array(
                        'id' => $row['SN'],
                        'time' => $row['time'],
                        'title1' => $row['title1'],
                        'article1' => $row['article1'], 
                        'title2' => $row['title2'],
                        'article2' => $row['article2'],
                        );
                        $i++;  
                    }
                }
            }
            else{
                $error = "Enter date greater than 2020-02-21 OR less than ".$max_date;
            }
        }
        
}
mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Results</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="finalcss.css">	     	
    </head>
    <body>
        <?php include 'navigation.php'?>
        <?php include 'small_search.php'?>
        <div class="container-fluid">
            <div id="view-result-container">
                <table border="1px">
                    <tr>
                        <th rowspan="2" class="th">S.N.</th>
                        <th rowspan="2" class="th">Time</th>
                        <th colspan='2' class='th'>NepalNews</th>
                        <th colspan='2' class='th'>NepalKhabar</th>
                        <?php if(isset($_SESSION['username']) && $user_type > 0){
                            echo "<th  rowspan ='2' class='th'>Action</th>";
                            } 
                        ?>
                    </tr>
                    <tr>
                        <td class="th">Title</td>
                        <td class="th">Article</td>

                        <td class="th">Title</td>
                        <td class="th">Article</td>
                    </tr>
                    <tr>
                    <?php if(!empty($datas)){foreach($datas as $index => $data){
                    echo "<tr>";
                    $index = $index+1;
                    echo "<td>".$index ."</td>";
                    echo "<td>".$data['time']."</td>";
                    echo "<td>".$data['title1']."</td>";
                    if(isset($_SESSION['username'])){
                        echo "<td>";
                        echo "<form action='read.php' method='POST'>";
                        echo "<input type='hidden' name='hidden-value' value='".$data['title1']."'>";
                        echo "<button type='submit' name='readmore1' class='read-more btn-link' style='border:none;'>ReadMore</button>";
                        echo "</form>";
                        echo "<td>".$data['title2']."</td>";
                        echo "<td>";
                        echo "<form action='read.php' method='POST'>";
                        echo  "<input type='hidden' name='hidden-value' value='".$data['title2']."'>";
                        echo "<button type='submit' name='readmore2' class='read-more btn-link' style='border:none;'>ReadMore</button>";
                        echo "</form>";
                        echo "</td>";
                    }
                    else{
                        echo "<td><a href='login.php'>Login</a></td>";
                        echo "<td>".$data['title2']."</td>";
                        echo "<td><a href='login.php'>Login</a></td>";
                    }
                    if(isset($_SESSION['username']) && $user_type > 0){
                        echo "<td><form action='delete_data_admin.php' method='POST'>";
                        echo "<input type='hidden' name='hidden-value-user' value='".$data['id']."'>";
                        echo "<button type='submit' name='delete-value-user' class='read-more btn-link' style='border:none;'>Delete</button>";
                        echo "</form></td>";
                    }
                    echo "</tr>";
                    }}?>
                    </tr>     
                </table>
                <?php if(!empty($error)){?>
                            <tr>
                            <td class="error"><?=$error ?></td>
                            </tr>                  
                <?php }?>
            </div>
        </div>
        <?php include 'footer.php'?>
    </body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="darkmode.js"></script>

</html>