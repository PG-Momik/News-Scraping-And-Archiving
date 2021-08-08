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
    <title>Add</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">	
</head>
<body>
    <?php include 'partials/navigation.php';?>
    <div class="container-fluid" >
        <h1 id="add-heading">Add Scrape Parameters</h1>
        <div id="content">
            <form id="form-ko" action="" method="POST">
                <div class="row add-row">
                    <label for="name" class="col">
                    Name
                    </label>
                    <input type="text" name="name" id="news-name" class="col">
                </div>
                <div class="row add-row">
                    <label for="url" class="col">
                        Url
                    </label>
                    <input type="url" name="url" id="news-url" class="col">
                </div>
                <div class="row add-row">
                    <label for="title-class" class="col">
                        Title Class
                    </label>
                    <input type="text" name="title-class" id="news-title-class" class="col">
                </div>
                <div class="row add-row">
                    <label for="article-class" class="col">
                        Article Class
                    </label>
                    <input type="text" name="article-class" id="news-article-class" class="col">
                </div>
                <div class="row add-row">
                    <label for="article-link-class" class="col">
                        Article Link Class
                    </label>
                    <input type="text" name="article-link-class" id="news-article-link-class" class="col">
                </div>
                <div class="row add-row">
                    <button type="submit" name="add" id="add-button" >Add</button>
                </div>
            </form>
        </div>
    </div>
<?php include 'footer.php';?>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="../js/darkmode.js"></script>

</html>
<?php
    include 'configure.php';
    if(isset($_POST['add']) && 
    isset($_POST['name']) && 
    isset($_POST['url']) && 
    isset($_POST['title-class']) && 
    isset($_POST['article-class']) && 
    isset($_POST['article-link-class'])){
        $name = $_POST['name'];
        $url = $_POST['url'];
        $title_class = $_POST['title-class'];
        $article_class = $_POST['article-class'];
        $article_link_class = $_POST['article-link-class'];

        $sql = "INSERT into newsinfotabel (name, url, title_class, article_class, article_link_class) VALUES ('$name','$url','$title_class','$article_class','$article_link_class')";

        if(mysqli_query($conn, $sql)){
            header("Location:http://localhost/WebScraping/php/action_scraper.php");
        }
        else{
            header("Location:http://localhost/WebScraping/php/error.php");
        }
    }
}
?>