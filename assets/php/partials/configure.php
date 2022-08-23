<?php
$servername = "localhost";
$root = "root";
$pass = "";
$dbname = "NewsDetails";

$conn = mysqli_connect($servername, $root, $pass, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}