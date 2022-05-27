<script type="text/javascript">
	window.print();
</script>
<?php
session_start();
include "../koneksi.php";
$sqlSelect2="SELECT * FROM t_peserta WHERE no_peserta='$_SESSION[no_peserta]'";
$result2=mysqli_query($koneksi,$sqlSelect2)or die(mysqli_error($koneksi));
$row=mysqli_fetch_assoc($result2);
$sqlSelect3="SELECT * FROM t_hasil_ujian WHERE no_peserta='$_SESSION[no_peserta]' and hasil='benar'";
$result3=mysqli_query($koneksi,$sqlSelect3)or die(mysqli_error($koneksi));
$jumlah3=mysqli_num_rows($result3);
$nilai=($jumlah3/40)*100;
if($nilai<=60){
$status="TIDAK LULUS";
}else{
$status="LULUS";
}
?>
<h1>
	<center>SMK NEGERI XYZ - JAKARTA</center>
</h1>
<hr>
<center>
Saudara / saudari atas nama :
<u><strong><h2><?php echo strtoupper($row['nama']); ?></h2></strong></u>
	ANDA DINYATAKAN "<strong><?php echo $status; ?></strong>".<br>Dengan Nilai: <strong><?php echo $nilai; ?> </strong><br><br>
		*Apabila anda dinyatakan lulus, maka cetak halaman ini dan dibawa keruang panitia untuk verifikasi lebih lanjut.<br>
		Terima kasih telah mengikuti ujian tes penerimaan di SMK Negeri XYZ - Jakarta.<br><br>Hormat kami,<br><br><br><br> Panitia Pelaksana.
</center><br>
<hr>
<center>SISUO (Sistem Informasi Ujian Online) - SMK Negeri XYZ - Jakarta &copy; 2018</center>