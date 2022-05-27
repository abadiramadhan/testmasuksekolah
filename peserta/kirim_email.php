<?php
session_start();
$waktu = 60;
include "../koneksi.php";
$select="SELECT * FROM t_log_soal_peserta WHERE no_peserta='$_SESSION[no_peserta]'";
$result=mysqli_query($koneksi,$select);
$row = mysqli_fetch_assoc($result);
if (mysqli_num_rows($result) == 0) {
?>
<script>
    alert("Anda belum menyelesaikan Tes Penerimaan, Silahkan Tunggu Hasil Anda. Terima Kasih.");
    window.close();
</script>

<?php
}else{
$name="nur";
$email="nurabadiramadhan.mi@gmail.com";
$subject="tes";
$message="hallo";

$to=$email;

$message="From:$name <br />".$message;

$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";

// More headers
$headers .= 'From: Jurnalweb.com <noreply@yourwebsite.com>'."\r\n" . 'Reply-To: '.$name.' <'.$email.'>'."\r\n";
// $headers .= 'Cc: admin@yourdomain.com' . "\r\n"; //untuk cc lebih dari satu tinggal kasih koma
@mail($to,$subject,$message,$headers);
if(@mail)
{
echo "Email sent successfully !!";  
}  
}
?>