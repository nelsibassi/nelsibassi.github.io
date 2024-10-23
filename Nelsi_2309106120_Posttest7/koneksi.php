<?php

$servername = "localhost"; 
$dbname = "dataorder_db";
$username = "root"; 
$password = ""; 



$conn = new mysqli($servername,$dbname, $username, $password);


if ($conn->connect_error) {
    die("koneksi gagal: " . $conn->connect_error);
}
?>
