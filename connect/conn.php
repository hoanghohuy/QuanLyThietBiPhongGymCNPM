<?php
$servername = "localhost";
$database = "quan_ly_thiet_bi_phong_gym";
$username = "root";
$password = "";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
        mysqli_set_charset($conn, 'UTF8');
// Check connection
if (!$conn) {
    die("Connection failed: ");
}
?>