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
                
	include "koneksi.php";
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SISUO</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/plugins/select2/select2.min.css" rel="stylesheet">
    <link href="css/plugins/datapicker/datepicker3.css" rel="stylesheet">
    <script type="text/javascript">
    	function hanyaAngka(e, decimal) {
                var key;
                var keychar;
                if (window.event) {
                    key = window.event.keyCode;
                } else
                if (e) {
                    key = e.which;
                } else
                    return true;

                keychar = String.fromCharCode(key);
                if ((key == null) || (key == 0) || (key == 8) || (key == 9) || (key == 13) || (key == 27)) {
                    return true;
                } else
                if ((("0123456789").indexOf(keychar) > -1)) {
                    return true;
                } else
                if (decimal && (keychar == ".")) {
                    return true;
                } else
                    return false;
            }
    </script>

</head>

<body>

    <div id="wrapper">

    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src="img/admin.png" width="48px" height="48px" />
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
                    <span class="m-r-sm text-muted welcome-message">Welcome to SISUO (Sistem Informasi Ujian Online)</span>
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
                            <?php
                            $id_jurusan =$_GET['kode_jurusan'];
                            $sqlselect="SELECT * FROM t_soal WHERE id_jurusan='$id_jurusan'";
                            $result=mysqli_query($koneksi,$sqlselect);
                            $row=mysqli_fetch_assoc($result);
                            $jumlah=mysqli_num_rows($result);
                            if($jumlah == 0){
                                $nomer_soal=1;
                            }else{
                                $nomer_soal=$jumlah+1;
                            }

                            $sqlselect2="SELECT * FROM t_jurusan WHERE id_jurusan='$id_jurusan'";
                            $result2=mysqli_query($koneksi,$sqlselect2);
                            $row2=mysqli_fetch_assoc($result2);
                            ?>
                           	<h3><a href="#">INPUT SOAL</a></h3>
                            <a href='lihat_soal.php?kode_jurusan=<?php echo $row['id_jurusan']; ?>' class='label label-warning'>Lihat Soal</a>
                            <div class="hr-line-dashed"></div>
                            <form class="form-horizontal" method="post">

                                <div class="form-group"><label class="col-sm-2 control-label">NO. SOAL</label>
                                    <div class="col-sm-10"><input type="text" class="text-uppercase form-control" name="no_soal" readonly="readonly" value="<?php
                                    echo $nomer_soal; ?>"></div>
                                </div>
								
								 <div class="form-group"><label class="col-sm-2 control-label">JURUSAN</label>
                                    <div class="col-sm-10"><input type="text" class="text-uppercase form-control" readonly="readonly" value="<?php
                                    echo $row2['nama_jurusan']; ?>">
                                    <input type="text"  value="<?php echo $row2['id_jurusan']; ?>" name="jurusan" hidden="hidden" id="jurusan">
                                </div>
                                </div> 

								<div class="form-group"><label class="col-sm-2 control-label">SOAL</label>
									<div class="col-sm-10"><textarea type="text" class="form-control 1300" style="height:200px; text-transform: uppercase;" name="soal" required></textarea></div>
                            	</div>

								<div class="form-group"><label class="col-sm-2 control-label">PILIHAN 1 (A)</label>
									<div class="col-sm-10"><input type="text" class="text-uppercase form-control" name="pilihan1" required></div>
                            	</div>

                                <div class="form-group"><label class="col-sm-2 control-label">PILIHAN 2 (B)</label>
                                    <div class="col-sm-10"><input type="text" class="text-uppercase form-control" name="pilihan2" required></div>
                                </div>    

                                <div class="form-group"><label class="col-sm-2 control-label">PILIHAN 3 (C)</label>
                                    <div class="col-sm-10"><input type="text" class="text-uppercase form-control" name="pilihan3" required></div>
                                </div> 

                                <div class="form-group"><label class="col-sm-2 control-label">PILIHAN 4 (D)</label>
                                    <div class="col-sm-10"><input type="text" class="text-uppercase form-control" name="pilihan4" required></div>
                                </div> 

                                <div class="form-group"><label class="col-sm-2 control-label">PILIHAN 5 (E)</label>
                                    <div class="col-sm-10"><input type="text" class="text-uppercase form-control" name="pilihan5" required></div>
                                </div> 

                                 <div class="form-group"><label class="col-sm-2 control-label">JAWABAN YANG BENAR</label>
                                    <div class="col-sm-10"><input type="text" class="text-uppercase form-control" name="benar" required></div>
                                </div> 
                        	                             	                         	      

								<div class="form-group">
									<label class="col-sm-2 control-label">&nbsp;</label>
									<div class="col-sm-2"><input type="submit" class="btn btn-primary block full-width m-b" name="simpan" value="Simpan" id="simpan"></div>
                            	</div> 

                            	<?php
                            	if(isset($_POST['simpan'])) { 
                            		 $no_soal = $_POST['no_soal'];
                            		 $jurusan = $_POST['jurusan'];
                            		 $soal = $_POST['soal'];
                            		 $pilihan1 = $_POST['pilihan1'];
                            		 $pilihan2 = $_POST['pilihan2'];
                            		 $pilihan3 = $_POST['pilihan3'];
                            		 $pilihan4 = $_POST['pilihan4'];
                            		 $pilihan5 = $_POST['pilihan5'];
                            		 $benar = $_POST['benar'];
                            		 
                            		 //simpan
                            		 $simpan="INSERT INTO t_soal
                            		 VALUES
                            		 (NULL,'$no_soal','$id_jurusan','$soal','$pilihan1','$pilihan2','$pilihan3','$pilihan4','$pilihan5','$benar')";

                            		 $resultSimpan=mysqli_query($koneksi,$simpan) or die (mysqli_error($koneksi));

                            		 ?><script>
                            		 	alert("Berhasil Simpan"); 
                                        window.history.back();
                            		 </script> <?php ;
                            	}
                            	?>                            	                           	 								
                            </form>
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
    <script src="js/jquery-2.1.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>


</body>

</html>
<!-- Select2 -->
<script src="js/plugins/select2/select2.full.min.js"></script>
<!-- Data picker -->
<script src="js/plugins/datapicker/bootstrap-datepicker.js"></script>
<script type="text/javascript">
	 $(".select2_demo_3").select2({
                placeholder: "Select a state",
                allowClear: true
            });

	  $('.tanggal').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true
            });
</script>
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