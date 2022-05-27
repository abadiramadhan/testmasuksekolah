<?php
$servername = "localhost";
$username = "root";
$password = "";
$nama_db = "db_sekolah";

// Create connection
$conn = new mysqli($servername, $username, $password, $nama_db);
$koneksi = mysqli_connect($servername, $username, $password, $nama_db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else{
echo "&nbsp;";
}
?>