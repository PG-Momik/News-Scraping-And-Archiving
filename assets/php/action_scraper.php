<?php 
    include 'session_verification.php';
    if(($_SESSION['priority'])<1){
        header("Location:http://localhost/loginpage/error.php");
    }
    else{
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scraper Parameters</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">	
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
<?php 
    include '../php/partials/navigation.php';
?>
<div class="container-fluid">
<br>
<div id="action-scrape-container">
    <?php
        include "configure.php";
        $sql = "SELECT * FROM newsinfotabel";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0){
            $i = 0;
            while($row = mysqli_fetch_assoc($result)) {
                $infos[$i] = array(
                    "id" => $row['id'],
                    "name" => $row['name'],
                    "url" => $row['url'],
                    "title_class" => $row['title_class'],
                    "article_class" => $row['article_class'],
                    "article_link_class" => $row['article_link_class'],
                );
                $i++;
            }
        }
        mysqli_close($conn);
    ?>   
        <div class='row table-head' style="min-height:75px; text-align:center;">
            <div class='col-1 center-text action-scraper-col'>SN</div>
            <div class='col-1 center-text action-scraper-col'>Name</div>
            <div class='col-4 center-text hide-in-mobile'>URL</div>
            <div class='col-1 center-text hide-in-mobile'>Title Class</div>
            <div class='col-1 center-text hide-in-mobile'>Article Class</div>
            <div class='col-2 center-text hide-in-mobile'>Article Link Class</div>
            <div class='col-2 center-text action-scraper-col'>Action</div>
        </div>

        <?php 
            foreach($infos as $index => $info){
            echo "<div class='row' style='border:1px solid black; margin: 0 auto;text-align:center; min-height:75px'>";
                $index++;
                $_SESSION['index'] = $index;
            echo "<div class='col-1 center-text action-scraper-col'>".$index."</div>";
            echo "<div class='col-1 center-text action-scraper-col'>".$info['name']."</div>";
            echo "<div class='col-4 center-text hide-in-mobile'>".$info['url']."</div>";
            echo "<div class='col-1 center-text hide-in-mobile'>".$info['title_class']."</div>";
            echo "<div class='col-1 center-text hide-in-mobile'>".$info['article_class']."</div>";
            echo "<div class='col-2 center-text hide-in-mobile'>".$info['article_link_class']."</div>";
            echo "<div class='col-2 center-text action-scraper-col'>";
        ?>
            <div class="row" id="update-delete-scrape">
                <div class='col'>
                    <form method='POST' action='deletescraper.php'>
                        <input type='hidden' name='index-identifier' id='' value="<?=$info['id']?>">
                        <button type='submit' name='Delete' id='delete' class='btn-danger'>Delete</button>
                    </form>
                </div>
                <div class='col'>
                    <form method='POST' action='updatescraper.php'>
                        <input type='hidden' name='index-identifier' id='' value="<?=$info['id']?>">
                        <button type='submit' name='Update' id='update' class='btn-primary'>Update</button>
                    </form>
                </div>
            </div>
            </div>
            <?php
            echo "</div>";
        }
        echo "</table>";
    ?>
    
    </div>
</div>    
<?php include '../php/partials/footer.php';?>
</body>
</html>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="../js/darkmode.js"></script>

<?php
    }
?>