<?php
    if(isset($_POST['Update'])){
        $index = $_POST['index-identifier'];
        include 'configure.php';
        $sql = "SELECT * from newsinfotabel where id = '$index'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0){
            $i = 0;
            while($row = mysqli_fetch_assoc($result)) {
                $datas[$i] = array(
                    'id' => $row['id'],
                    'name' => $row['name'],
                    'url' => $row['url'], 
                    'title_class' => $row['title_class'],
                    'article_class' => $row['article_class'],
                    'article_link_class' => $row['article_link_class'],
                );
                $i++;  
            }
        }
    }
    mysqli_close($conn);
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
    <link rel="stylesheet" type="text/css" href="finalcss.css">	

</head>
<body>
<?php include 'session_verification.php'?>
<?php include 'navigation.php'?>
<br>
<div class="container-fluid">
<div id="update-container" style="width:50%;">
    <h1 style="text-align: center">
        Update Form
    </h1>
    <br>
    <form method="POST" action="updater.php">
        <div class="row">
            <label for="id" class="col">SN</label>
            <input type="text" class="col" value='<?=$datas[0]['id'];?>' name="id" required readonly>
        </div>
        <div class="row">
            <label for="name" class="col">Name</label>
            <input type="text" class="col" value='<?=$datas[0]['name'];?>' name="name" required>
        </div>
        
        <div class="row">
            <label for="url" class="col">URL</label>
            <input type="text" class="col" value='<?=$datas[0]['url'];?>' name="url" required>
        </div>
        
        <div class="row">
            <label for="title-class" class="col">Title Class</label>
            <input type="text" class="col" value='<?=$datas[0]['title_class'];?>' name="title-class" required>
        </div>
        
        <div class="row">
            <label for="article-class" class="col">Article Class</label>
            <input type="text" class="col" value='<?=$datas[0]['article_class'];?>' name="article-class" required>
        </div>
        
        <div class="row">
            <label for="article-link-class" class="col">Article Link Class</label>
            <input type="text" class="col" value='<?=$datas[0]['article_link_class'];?>' name="article-link-class" required>
        </div>
        <div class="row">
            <div class="col-4">
                <input type="submit" value="update" class="btn btn-primary" name="Update">
            </div>
        </div>
    </form>
</div>
</div>
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
<script src="darkmode.js"></script>
</body>
</html>