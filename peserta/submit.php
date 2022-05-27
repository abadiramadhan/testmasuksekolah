<?php
error_reporting(0);
session_start();
include "../koneksi.php";
// if(isset($_POST['simpan'])) { 
// for($x=1;$x<=$jumlah;$x++){
//  $jawab = $_POST['radio'.$x];
//  if($jawab==""){
//     $isi="kosong";
//  }else{
//     $isi=$jawab;
//  }
$id_jurusan = $_POST['id_jurusan'];
$nama = $_POST['nama'];
$urut = $_POST['urut'];
$sqlSelect2="select * from t_soal where id_jurusan=$id_jurusan and no_urut_soal=$urut";
$result2=mysqli_query($koneksi,$sqlSelect2)or die(mysqli_error($koneksi));
$row3=mysqli_fetch_assoc($result2);
$a=strtolower($nama);
$b=strtolower($row3['jawaban']);
if($a==$b){
    $hasil="benar";
    $i=1;
}else{
    $hasil="salah";
    $i=0;
}
$simpan2="INSERT INTO t_hasil_ujian
        VALUES
        (NULL,'$_SESSION[no_peserta]','$row3[id_soal]','$hasil')";

        $resultSimpan2=mysqli_query($koneksi,$simpan2) or die (mysqli_error($koneksi));

        echo"$i";
// }
// }
 ?>