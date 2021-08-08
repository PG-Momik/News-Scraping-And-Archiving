<?php
//load session
session_start();
//deleting session variables
session_unset();
//destroying session 
session_destroy();
header('Location:http://localhost/WebScraping/php/index.php');
?>