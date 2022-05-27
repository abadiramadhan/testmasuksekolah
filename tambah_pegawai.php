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
                           	<h3><a href="#">INPUT PEGAWAI</a></h3>
                            <div class="hr-line-dashed"></div>
                            <form class="form-horizontal" method="post">
								<div class="form-group"><label class="col-sm-2 control-label">NAMA PEGAWAI</label>
									<div class="col-sm-10"><input type="text" class="text-uppercase form-control" name="nama" required ></div>
                            	</div>

								<div class="form-group"><label class="col-sm-2 control-label">TEMPAT LAHIR</label>
									<div class="col-sm-10"><input type="text" class="text-uppercase form-control" name="tempat_lahir" required></div>
                            	</div>                            	

								<div class="form-group"><label class="col-sm-2 control-label">TANGGAL LAHIR</label>
									<div class="col-sm-10"><input type="text" class="form-control tanggal" name="tanggal_lahir" required></div>
                            	</div>

								<div class="form-group"><label class="col-sm-2 control-label">JENIS KELAMIN</label>
									<div class="col-sm-10"><select class="select2_demo_3 form-control" name="jenkel" required="">
                                        <option value="JENIS KELAMIN">-- PILIH JENIS KELAMIN --</option>
                                        <option value="LAKI-LAKI">LAKI-LAKI</option>
                                        <option value="PEREMPUAN">PEREMPUAN</option>
                                    </select></div>
                            	</div> 

								<div class="form-group"><label class="col-sm-2 control-label">AGAMA</label>
									<div class="col-sm-10"><select class="select2_demo_3 form-control" name="agama" required>
                                        <option value="AGAMA">-- PILIH AGAMA -- </option>
                                        <option value="ISLAM">ISLAM</option>
                                        <option value="HINDU">HINDU</option>
                                        <option value="BUDHA">BUDHA</option>
                                        <option value="PROTESTAN">PROTESTAN</option>
                                        <option value="KATOLIK">KATOLIK</option>
										<option value="KONG HU CU">KONG HU CU</option>
                                    </select></div>
                            	</div> 

								<div class="form-group"><label class="col-sm-2 control-label">JABATAN</label>
									<div class="col-sm-10"><input type="text" class="text-uppercase form-control" name="jabatan" required></div>
                            	</div>                            	                            	                            	      
								<div class="form-group"><label class="col-sm-2 control-label">PENDIDIKAN</label>
									<div class="col-sm-10"><select class="select2_demo_3 form-control" name="pendidikan" required>
                                        <option value="PENDIDIKAN">-- PILIH PENDIDIKAN -- </option>
                                        <option value="S3">S3</option>
                                        <option value="S2">S2</option>
                                        <option value="S1">S1</option>
                                        <option value="D3">D3</option>
                                        <option value="SMA">SMA</option>
										<option value="SMK">SMK</option>
										<option value="SMP">SMP</option>
                                    </select></div>
                            	</div> 
								
								<div class="form-group"><label class="col-sm-2 control-label">NO. HP</label>
									<div class="col-sm-10"><input type="text" class="text-uppercase form-control" name="no_hp"  required onkeypress="return hanyaAngka(event, false)" maxlength="12"></div>
                            	</div>  

								<div class="form-group"><label class="col-sm-2 control-label">ALAMAT</label>
									<div class="col-sm-10"><textarea type="text" class="form-control 1300" style="height:200px; text-transform: uppercase;" name="alamat" required></textarea></div>
                            	</div>

								<div class="form-group"><label class="col-sm-2 control-label">STATUS PERNIKAHAN</label>
									<div class="col-sm-10"><select class="select2_demo_3 form-control" name="status_pernikahan" required>
                                        <option value="STATUSPERNIKAHAN">-- PILIH STATUS PENIKAHAN -- </option>
                                        <option value="KAWIN">KAWIN</option>
                                        <option value="BELUM KAWIN">BELUM KAWIN</option>
                                        <option value="JANDA">JANDA</option>
                                        <option value="DUDA">DUDA</option>
                                    </select></div>
                            	</div>  

								<div class="form-group"><label class="col-sm-2 control-label">STATUS KERJA</label>
									<div class="col-sm-10"><input type="text" class="text-uppercase form-control" name="status_kerja" required></div>
                            	</div>   

								<div class="form-group"><label class="col-sm-2 control-label">TANGGAL MASUK</label>
									<div class="col-sm-10"><input type="text" class="form-control tanggal" name="tanggal_masuk" required></div>
                            	</div>                    	                             	                         	      

								<div class="form-group">
									<label class="col-sm-2 control-label">&nbsp;</label>
									<div class="col-sm-2"><input type="submit" class="btn btn-primary block full-width m-b" name="simpan" value="Simpan" id="simpan"></div>
                            	</div> 

                            	<?php
                            	if(isset($_POST['simpan'])) { 
                            		 $nama = $_POST['nama'];
                            		 $tempat_lahir = $_POST['tempat_lahir'];
                            		 $tanggal_lahir = $_POST['tanggal_lahir'];
                            		 $jenkel = $_POST['jenkel'];
                            		 $agama = $_POST['agama'];
                            		 $jabatan = $_POST['jabatan'];
                            		 $pendidikan = $_POST['pendidikan'];
                            		 $no_hp = $_POST['no_hp'];
                            		 $alamat = $_POST['alamat'];
                            		 $status_pernikahan = $_POST['status_pernikahan'];
                            		 $status_kerja = $_POST['status_kerja'];
                            		 $tanggal_masuk = $_POST['tanggal_masuk'];

                            		 //Build NIP
                            		 $tanggal=getdate();
                            		 $splitTanggal=explode("/", $tanggal_lahir);
                            		 $splitTanggalMasuk=explode("/", $tanggal_masuk);
                            		 $nip=$tanggal['year']."".$splitTanggal[1]."".$splitTanggalMasuk[1]."".$splitTanggalMasuk[0];

                            		 $gabung1=$splitTanggal[1]."/".$splitTanggal[0]."/".$splitTanggal[2];
                            		 $gabung2=$splitTanggalMasuk[1]."/".$splitTanggalMasuk[0]."/".$splitTanggalMasuk[2];


                            		 //simpan
                            		 $simpan="INSERT INTO t_pegawai
                            		 VALUES
                            		 ('$nip','$nama','$tempat_lahir','$gabung1','$jenkel','$agama','$jabatan','$pendidikan','$no_hp','$alamat','$status_pernikahan','$status_kerja','$gabung2')";

                            		 $resultSimpan=mysqli_query($koneksi,$simpan) or die (mysqli_error($koneksi));

                            		 ?><script>
                            		 	alert("Berhasil Simpan");
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