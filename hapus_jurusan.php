<?php
include 'koneksi.php';
// menyimpan data id kedalam variabel
$id   = $_GET['id'];
// query SQL untuk insert data
$query="DELETE from t_jurusan where id_jurusan='$id'";
mysqli_query($koneksi, $query);
// mengalihkan ke halaman index.php
header("location:list_jurusan");
?>