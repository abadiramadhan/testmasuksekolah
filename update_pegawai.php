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
	$nip=$_GET['nip'];
	$sqlselect="SELECT * FROM t_pegawai WHERE nip=$nip";
	$result=mysqli_query($koneksi,$sqlselect) or die (mysqli_error($koneksi));
	$row=mysqli_fetch_assoc($result);	
    $nama= $row['nama'];
    $tempat_lahir= $row['tempat_lahir'];
    $tanggal_lahir= $row['tanggal_lahir'];
    $jabatan= $row['jabatan'];
    $no_hp= $row['no_hp'];
    $alamat= $row['alamat'];
    $status_kerja= $row['status_kerja'];
    $tanggal_masuk= $row['tanggal_masuk'];
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
                           	<h3><a href="#">UPDATE PEGAWAI</a></h3>
                            <div class="hr-line-dashed"></div>
                            <form class="form-horizontal" method="post">
								 <form class="form-horizontal" method="post">
								<div class="form-group"><label class="col-sm-2 control-label">NIP PEGAWAI</label>
									<div class="col-sm-10">
										<input type="text" class="text-uppercase form-control" disabled="" value="<?php echo $nip; ?>">
										<input type="text" name="nip" value="<?php echo $nip; ?>" hidden="hidden">
									</div>
                            	</div>                            	
								<div class="form-group"><label class="col-sm-2 control-label">NAMA PEGAWAI</label>
									<div class="col-sm-10">
										<input type="text" class="text-uppercase form-control" value="<?php echo $nama; ?>" name="nama" required >
									</div>
                            	</div>

								<div class="form-group"><label class="col-sm-2 control-label">TEMPAT LAHIR</label>
									<div class="col-sm-10">
										<input type="text" class="text-uppercase form-control" name="tempat_lahir" required value="<?php echo $tempat_lahir; ?>">
									</div>
                            	</div>                            	

								<div class="form-group"><label class="col-sm-2 control-label">TANGGAL LAHIR</label>
									<div class="col-sm-10">
										<input type="text" class="form-control tanggal" name="tanggal_lahir" required value="<?php echo $tanggal_lahir; ?>">
									</div>
                            	</div>

								
								<div class="form-group"><label class="col-sm-2 control-label">JENIS KELAMIN</label>
									<div class="col-sm-10"><select class="select2_demo_3 form-control" name="jenkel" required="">
                                        
										<option value="LAKI-LAKI" <?php if($row['jenkel'] == 'LAKI-LAKI'){ echo 'selected'; } ?>> LAKI-LAKI</option>	<!-- jika data di database sama dengan value maka akan terselect/terpilih -->
										<option value="PEREMPUAN" <?php if($row['jenkel'] == 'PEREMPUAN'){ echo 'selected'; } ?>> PEREMPUAN</option>	<!-- jika data di database sama dengan value maka akan terselect/terpilih -->
										
                                    </select></div>
                            	</div> 

								<div class="form-group"><label class="col-sm-2 control-label">AGAMA</label>
									<div class="col-sm-10"><select class="select2_demo_3 form-control" name="agama" required>
                                        
										<option value="ISLAM" <?php if($row['agama'] == 'ISLAM'){ echo 'selected'; } ?>>ISLAM</option>
										<option value="HINDU" <?php if($row['agama'] == 'HINDU'){ echo 'selected'; } ?>>HINDU</option>
										<option value="BUDHA" <?php if($row['agama'] == 'BUDHA'){ echo 'selected'; } ?>>BUDHA</option>
										<option value="PROTESTAN" <?php if($row['agama'] == 'PROTESTAN'){ echo 'selected'; } ?>>PROTESTAN</option>
										<option value="KATOLIK" <?php if($row['agama'] == 'KATOLIK'){ echo 'selected'; } ?>>KATOLIK</option>
										<option value="KONG HU CU" <?php if($row['agama'] == 'KONG HU CU'){ echo 'selected'; } ?>>KONG HU CU</option>
									</select></div>
                            	</div> 

								<div class="form-group"><label class="col-sm-2 control-label">JABATAN</label>
									<div class="col-sm-10"><input type="text" class="text-uppercase form-control" name="jabatan" required value="<?php echo $jabatan; ?>"></div>
									
                            	</div>                            	                            	                            	      
								<div class="form-group"><label class="col-sm-2 control-label">PENDIDIKAN</label>
									<div class="col-sm-10"><select class="select2_demo_3 form-control" name="pendidikan" required>
                                        
										
										<option value="S3" <?php if($row['pendidikan'] == 'S3'){ echo 'selected'; } ?>>S3</option>
										<option value="S2" <?php if($row['pendidikan'] == 'S2'){ echo 'selected'; } ?>>S2</option>
										<option value="S1" <?php if($row['pendidikan'] == 'S1'){ echo 'selected'; } ?>>S1</option>
										<option value="D3" <?php if($row['pendidikan'] == 'D3'){ echo 'selected'; } ?>>D3</option>
										<option value="SMA" <?php if($row['pendidikan'] == 'SMA'){ echo 'selected'; } ?>>SMA</option>
										<option value="SMK" <?php if($row['pendidikan'] == 'SMK'){ echo 'selected'; } ?>>SMK</option>
										<option value="SMP" <?php if($row['pendidikan'] == 'SMP'){ echo 'selected'; } ?>>SMP</option>
										
										
										
                                    </select></div>
                            	</div> 
								
								<div class="form-group"><label class="col-sm-2 control-label">NO. HP</label>
									<div class="col-sm-10"><input type="text" class="text-uppercase form-control" name="no_hp"  required onkeypress="return hanyaAngka(event, false)" maxlength="12" value="<?php echo $no_hp; ?>"></div>
                            	</div>  

								<div class="form-group"><label class="col-sm-2 control-label">ALAMAT</label>
									<div class="col-sm-10"><textarea type="text" class="form-control 1300" style="height:200px; text-transform: uppercase;" name="alamat" required"><?php echo $alamat; ?></textarea></div>
                            	</div>

								<div class="form-group"><label class="col-sm-2 control-label">STATUS PERNIKAHAN</label>
									<div class="col-sm-10"><select class="select2_demo_3 form-control" name="status_pernikahan" required>
                                        
										<option value="Kawin" <?php if($row['status_nikah'] == 'Kawin'){ echo 'selected'; } ?>>Kawin</option>
										<option value="Belum Kawin" <?php if($row['status_nikah'] == 'Belum kawin'){ echo 'selected'; } ?>>Belum Kawin</option>
										<option value="Janda" <?php if($row['status_nikah'] == 'Janda'){ echo 'selected'; } ?>>Janda</option>
										<option value="Duda" <?php if($row['status_nikah'] == 'Duda'){ echo 'selected'; } ?>>Duda</option>
										
                                    </select></div>
                            	</div>  
 
								<div class="form-group"><label class="col-sm-2 control-label">STATUS KERJA</label>
									<div class="col-sm-10"><input type="text" class="text-uppercase form-control" name="status_kerja" required value="<?php echo $status_kerja; ?>"></div>
                            	</div>   

								<div class="form-group"><label class="col-sm-2 control-label">TANGGAL MASUK</label>
									<div class="col-sm-10"><input type="text" class="form-control tanggal" name="tanggal_masuk" required value="<?php echo $tanggal_masuk;?>"></div>
                            	</div>                	                         	      

								<div class="form-group">
									<label class="col-sm-2 control-label">&nbsp;</label>
									<div class="col-sm-2"><input type="submit" class="btn btn-primary block full-width m-b" name="simpan" value="Simpan" id="simpan"></div>
                            	</div> 

                            	<?php
                            	include "key.php";
                            	include "RC4.php";
                            	if(isset($_POST['simpan'])) { 
                                     $nip = $_POST['nama'];
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


                            		 //simpan
									 
									 $simpan="UPDATE t_pegawai SET nip='$nip',nama='$encrypt',tmpt_lahir='$tempat_lahir',tgl_lahir='$tanggal_lahir',jenkel='$jenkel',agama='$agama',jabatan='$jabatan',pendidikan='$pendidikan',no_hp='$no_hp',alamat='$alamat',status_pernikahan='$status_pernikahan',status_kerja='$status_kerja',tgl_masuk='$tanggal_masuk',kd_golongan='$golongan' WHERE nip=$nip";

                            		 $resultSimpan=mysqli_query($koneksi,$simpan) or die (mysqli_error($koneksi));
									?>
									<script>
                            		 	alert("Berhasil Simpan");
										document.location='list_pegawai.php'
                            		 </script> 
									 
									 <?php ;
										
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
            document.location='login'</script>
            <?php
}
}
?>