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
    <link href="../css/plugins/select2/select2.min.css" rel="stylesheet">
    <link href="../css/plugins/datapicker/datepicker3.css" rel="stylesheet">
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
                           	<h3><a href="#">BIODATA DIRI</a></h3>
                            <?php
                            $sqlselect="SELECT * FROM t_peserta WHERE no_peserta='$_SESSION[no_peserta]'";
                            $result=mysqli_query($koneksi,$sqlselect);
                            $row = mysqli_fetch_assoc($result);
                            ?>
                            <div class="hr-line-dashed"></div>
                            <form class="form-horizontal" method="post" enctype="multipart/form-data">
                                <div class="form-group"><label class="col-sm-2 control-label">USERNAME</label>
                                    <div class="col-sm-10"><input type="text" class="form-control" name="username" maxlength="20" placeholder="Username" value="<?php echo$row['username']; ?>" required></div>
                                </div>
                                
                                 <div class="form-group"><label class="col-sm-2 control-label">PASSWORD</label>
                                    <div class="col-sm-10"><input type="password" class="form-control" placeholder="Password" required="" id="password" title="8 Character Password. Use Uppercase, Lowercase and Numeric" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" name="password" maxlength="20" value="<?php echo$row['keterangan']; ?>" readonly="">*Password tidak dapat diubah, apabila lupa password pilih tombol dibawah ini untuk mengirimkan Password anda ke alamat E-mail</div>
                                </div> 

                                <div class="form-group"><label class="col-sm-2 control-label">NAMA</label>
                                    <div class="col-sm-10"><input type="text" class="form-control" name="nama" placeholder="Nama" value="<?php echo $row['nama']; ?>" required></div>
                                </div>

                                <div class="form-group"><label class="col-sm-2 control-label">JENIS KELAMIN</label>
                                    <div class="col-sm-10"><select class="select2_demo_3 form-control" name="jenkel" required="">
                                        <?php
                                        if($row['jenkel'] == 'LAKI-LAKI'){
                                        ?>
                                        <option value="LAKI-LAKI" selected>LAKI_LAKI</option>
                                        <option value="PEREMPUAN">PEREMPUAN</option>
                                        <?php
                                        }else{
                                        ?>
                                        <option value="LAKI-LAKI">LAKI_LAKI</option>
                                        <option value="PEREMPUAN" selected>PEREMPUAN</option>
                                        <?php    
                                        }
                                        ?>  
                                    </select></div>
                                </div> 

                                <div class="form-group"><label class="col-sm-2 control-label">TANGGAL LAHIR</label>
                                    <div class="col-sm-10"><input type="text" class="form-control tanggal" name="tanggal_lahir" value="<?php echo $row['tanggal']; ?>" required></div>
                                </div>

                                <div class="form-group"><label class="col-sm-2 control-label">Alamat</label>
                                    <div class="col-sm-10"><textarea class="form-control 1300" style="height:200px; text-transform: uppercase;" name="alamat" required><?php echo $row['alamat']; ?></textarea></div>
                                </div>

                                <div class="form-group"><label class="col-sm-2 control-label">FOTO</label>
                                    <div class="col-sm-10"><?php
                                    echo "<img alt='image' class='img-circle' src='$_SESSION[foto]' width='300px' height='300px' />";
                                    ?><br><br><input type="file" class="btn btn-primary" name="foto" >* Foto Ukuran 4 x 6 dan Maksimal Ukuran File 3 MB</div>
                                </div>

                                <div class="form-group"><label class="col-sm-2 control-label">IJAZAH</label>
                                    <div class="col-sm-10"><?php
                                    echo "<img alt='image' class='img-circle' src='ijazah/$row[ijazah]' width='300px' height='300px' />";
                                    ?><br><br><input type="file" class="btn btn-primary" name="ijazah" >* Scan Ijazah dan Maksimal Ukuran File 3 MB</div>
                                </div>

                                <div class="form-group"><label class="col-sm-2 control-label">ASAL SEKOLAH</label>
                                    <div class="col-sm-10"><input type="text" class="form-control" name="asal" placeholder="Asal Sekolah" value="<?php echo $row['asal_sekolah']; ?>" required></div>
                                </div>

                                <div class="form-group"><label class="col-sm-2 control-label">NO. HP</label>
                                    <div class="col-sm-10"><input type="text" class="form-control" name="no_hp" placeholder="No. HP" required onkeypress="return hanyaAngka(event, false)" maxlength="12" value="<?php echo $row['no_hp']; ?>"></div>
                                </div>

                                <div class="form-group"><label class="col-sm-2 control-label">EMAIL</label>
                                    <div class="col-sm-10"><input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo $row['email']; ?>" required></div>
                                </div>                                                         

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">&nbsp;</label>
                                    <div class="col-sm-2"><input type="submit" class="btn btn-primary block full-width m-b" name="simpan" value="Simpan" id="simpan"></div>
                                </div> 

                                <?php
                                include "../koneksi.php";
                                include "../RC4.php";
                                include "../key.php";  
                                if(isset($_POST['simpan'])) { 
                                     $username = $_POST['username'];
                                     $nama = $_POST['nama'];
                                     $jenkel = $_POST['jenkel'];
                                     $tanggal_lahir = $_POST['tanggal_lahir'];
                                     $alamat = $_POST['alamat'];
                                     $foto =  $_FILES['foto']['name'];
                                     $ijazah =  $_FILES['ijazah']['name'];

                                     if($foto==""){
                                        $nama_foto=$row['foto'];
                                     }else{
                                         $ukuran_file = $_FILES['foto']['size'];
                                         if($ukuran_file > 3072000){
                                         ?>
                                         <script type="text/javascript">
                                             alert('Ukuran foto tidak sesuai, ulangi kembali !');
                                             window.history.back();
                                         </script>
                                         <?php
                                         }else{
                                            $format = pathinfo($foto, PATHINFO_EXTENSION);
                                            if( ($format == "jpg") or ($format == "png") ){
                                            $move = move_uploaded_file($_FILES['foto']['tmp_name'], 'foto/'.$foto);
                                            }else{
                                                ?>
                                                <script type="text/javascript">
                                                alert('Tipe foto tidak sesuai, ulangi kembali !');
                                                window.history.back();
                                                </script>
                                                <?php
                                                echo "ijazah/$ijazah";
                                            }
                                         }
                                         $nama_foto=$foto;
                                    }
                                    
                                    if($ijazah==""){
                                        $nama_ijazah=$row['ijazah'];
                                    }else{
                                     $ukuran_file2 = $_FILES['ijazah']['size'];
                                     if($ukuran_file2 > 3072000){
                                     ?>
                                     <script type="text/javascript">
                                         alert('Ukuran scan ijazah tidak sesuai, ulangi kembali !');
                                         window.history.back();
                                     </script>
                                     <?php
                                     }else{
                                            $format2 = pathinfo($ijazah, PATHINFO_EXTENSION);
                                            if( ($format2 == "jpg") or ($format2 == "png") ){
                                            $move = move_uploaded_file($_FILES['ijazah']['tmp_name'], 'ijazah/'.$ijazah);
                                            }else{
                                                ?>
                                                <script type="text/javascript">
                                                alert('Tipe scan ijazah tidak sesuai, ulangi kembali !');
                                                window.history.back();
                                                </script>
                                                <?php
                                            }
                                         }
                                         $nama_ijazah=$ijazah;
                                    }
                                     $asal = $_POST['asal'];
                                     $no_hp = $_POST['no_hp'];
                                     $email = $_POST['email'];
                                     
                                     //simpan
                                     $simpan="UPDATE t_peserta SET username='$username',nama='$nama',jenkel='$jenkel',tanggal='$tanggal_lahir',alamat='$alamat',foto='$nama_foto',ijazah='$nama_ijazah',asal_sekolah='$asal',no_hp='$no_hp',email='$email' WHERE no_peserta='$_SESSION[no_peserta]'";

                                     $resultSimpan=mysqli_query($koneksi,$simpan) or die (mysqli_error($koneksi));

                                     ?>
                                     <script>
                                        alert("Berhasil Diubah");
                                        window.history.back();
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
    <script src="../js/jquery-2.1.1.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="../js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="../js/inspinia.js"></script>
    <script src="../js/plugins/pace/pace.min.js"></script>


</body>

</html>
<!-- Select2 -->
<script src="../js/plugins/select2/select2.full.min.js"></script>
<!-- Data picker -->
<script src="../js/plugins/datapicker/bootstrap-datepicker.js"></script>
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