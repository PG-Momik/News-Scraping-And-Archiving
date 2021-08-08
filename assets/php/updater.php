<?php
    include 'configure.php';
    if(isset($_POST['Update']) &&
    isset($_POST['id']) && 
    isset($_POST['name']) && 
    isset($_POST['url']) && 
    isset($_POST['title-class']) && 
    isset($_POST['article-class']) && 
    isset($_POST['article-link-class'])){
            $id = $_POST['id'];
            $name = $_POST['name'];
            $url = $_POST['url'];
            $title_class = $_POST['title-class'];
            $article_class = $_POST['article-class'];
            $article_link_class = $_POST['article-link-class'];
            $sql = " UPDATE newsinfotabel SET 
                name = '$name', 
                url = '$url', 
                title_class = '$title_class',
                article_class = '$article_class',  
                article_link_class = '$article_link_class' WHERE id = '$id'";
            $result = mysqli_query($conn, $sql);
            header('Location:http://localhost/loginpage/action_scraper.php');
            }
    else{
        header('Location:http://localhost/loginpage/error.php');
    }
    mysqli_close($conn);
?>