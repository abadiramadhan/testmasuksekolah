<?php

			session_start();
            //waktu sekarang GMT+7
            $waktu=time()+25200;
            //waktu timeout (detik)
            $expired=600;
			//periksa apakah user telah login atau memiliki session
			if (empty($_SESSION['username']) AND empty($_SESSION['password'])) {
			?>
			<script language='javascript'>
			alert('Silahkan login Terlebih Dahulu');
			document.location='login'</script><?php
			} else {
                if($waktu < $_SESSION['timeout'])
                {
                //hapus sesi timeout yang lama ,buat sesi timeout yang baru
                unset($_SESSION['timeout']);
                $_SESSION['timeout']=$waktu+$expired;
			
	include "../koneksi.php";
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SISUO</title>

    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="../css/animate.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">

</head>

<body>

    <div id="wrapper">

    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element"> <span>
                            <?php
                            echo "<img alt='image' class='img-circle' src='$_SESSION[foto]' width='48px' height='48px' />";
                            ?>
                             </span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?php echo $_SESSION['username'];?></strong>
                             </span>  </a>
                    </div>
                </li>
               <?php
               include "menu.php";
               ?>                                                            
            </ul>
        </div>
    </nav>

        <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
            <form role="search" class="navbar-form-custom" action="search_results.html">
                
            </form>
        </div>
            <ul class="nav navbar-top-links navbar-right">
                <li>
                     <span class="m-r-sm text-muted welcome-message">SISUO (Sistem Informasi Ujian Online)</span>
                </li>
                <li>
                    <a href="logout">
                        <i class="fa fa-sign-out"></i> Log out
                    </a>
                </li>
            </ul>

        </nav>
        </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-content">
                           	<center><h1><a href="#">SELAMAT DATANG DI SISTEM UJIAN ONLINE SEKOLAH XYZ</a></h1></center>
                             <div class="hr-line-dashed"></div>
                             <h4>LANGKAH_LANGKAH PENGGUNAAN APLIKASI</h4>
                             <p>1. Pilih menu jurusan, untuk pilih jurusan. Apabila bila ingin mengubah jurusan harap hubungi pihak panitia.<br>
                                2. Setelah jurusan sudah dipilih maka menu soal dapat dikerjakan sampai selesai.<br>
                             - Soal terdiri dari 40 soal.<br>
                             - Soal adalah pilihan ganda yang harus dijawab dengan benar supaya mendapatkan nilai maksimal.<br>
                             - Dalam mengerjakan soal akan diberikan waktu 60 menit (1 jam).<br>
                             - Apabila pengisian soal telah selesai dari waktu yang ditentukan dapat memilih tombol finish untuk menyimpan.<br>
                             - Dan apabila waktu telah habis maka kolom soal akan hilang dan diharuskan memilih tombol finish untuk menyimpan.<br>
                             - Pengerjaan soal hanya dapat dilakukan sekali. Harap menggunakan koneksi yang stabil.<br>
                             - Hasil penilaian dapat dipilih pada menu kirim nilai setelah melesai mengerjakan soal dan nilai akan dikirimkan melalui email.<br>
                             - Tunjukkan email kepada panitia apabila anda telah dinyatakan "LULUS" untuk diberikan pengarahan mengenai tes selanjutnya.</p>
                        </div>
                    </div>
                </div>
        </div>
        </div>
        <div class="footer">
            
            <div>
                <strong>Copyright</strong> & INSPINIA ; SISUO (Sistem Informasi Ujian Online) - SMK Negeri XYZ - Jakarta &copy; 2018
            </div>
        </div>

        </div>
        </div>


    <!-- Mainly scripts -->
    <script src="../js/jquery-2.1.1.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="../js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="../js/inspinia.js"></script>
    <script src="../js/plugins/pace/pace.min.js"></script>


</body>

</html>
<?php
}else{
session_destroy();
?>            
<script language='javascript'>
alert('session kamu sudah habis,silahkan login kembali');
            document.location='login.php'</script>
            <?php
}
}
?>