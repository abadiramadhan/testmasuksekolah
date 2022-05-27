<?php
session_start();
$waktu = 90;
include "../koneksi.php";
$select="SELECT * FROM t_log_soal_peserta";
$result=mysqli_query($koneksi,$select);
$row = mysqli_fetch_assoc($result);
if (mysqli_num_rows($result) == 1) {
?>
<script>
    alert("Anda sudah menyelesaikan Tes Penerimaan, Silahkan Tunggu Hasil Anda. Terima Kasih.");
    window.close();
</script>

<?php
}else{
$lengkap=date('d/m/Y  h:i:sa');
$hari=date('l');
// $simpan="INSERT INTO t_log_soal_peserta
//     VALUES
//     (NULL,'$_SESSION[no_peserta]','$hari','$lengkap')";
// $resultSimpan=mysqli_query($koneksi,$simpan) or die (mysqli_error($koneksi));

?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SISUO</title>

    <!--Untuk Hitung Mundur-->
    <link rel="stylesheet" href="timer/jquery.countdown.css">
    <style type="text/css">
    #hitmundur { width: 240px; height: 45px; }
    </style>
    <script src="jquery.min.js"></script>
    <script src="timer/jquery.plugin.js"></script>
    <script src="timer/jquery.countdown.js"></script>

</head>

<body>
                            <div id="hitmundur"></div>
                       

   

</body>

</html>
<script type="text/javascript">
function waktuHabis(){
    alert("Waktu anda habis!!!");
    }       
function hampirHabis(periods){
    if($.countdown.periodsToSeconds(periods) == 60){
        $(this).css({color:"red"});
        }
    }
$(function(){
    
    var sisa_waktu =  <?php echo $waktu ?>;
    
    var TimeOut = sisa_waktu;
    $("#hitmundur").countdown({
        until: TimeOut,
        compact:true,
        onExpiry:waktuHabis,
        onTick: hampirHabis
        }); 
    });

// alert("waktu sudah habis 00000000");
</script>
<?php
}
?>