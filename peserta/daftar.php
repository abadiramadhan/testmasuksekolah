
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SISUO</title>

    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../font-awesome/css/font-awesome.css" rel="stylesheet">
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

    <link href="../css/animate.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">

</head>

<body>

    <div id="wrapper">

    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <!-- <li class="nav-header">
                    <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src="img/admin.png" width="48px" height="48px"" />
                             </span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?php echo $_SESSION['username'];?></strong>
                             </span>  </a>
                    </div>
                </li> -->
               <li>
                    <a href="#"><i class="fa fa-edit"></i> <span class="nav-label">PENDAFTARAN PESERTA</span></a>
                    <!-- <ul class="nav nav-second-level collapse">
                        <li><a href="list_soal.php">List Soal</a></li>
                        <!-- <li><a href="tambah_soal.php">Tambah Soal</a></li> -->
                    </ul> 
                </li>                                                         
            </ul>
        </div>
    </nav>

        <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
        <!-- <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0"> -->
        <!-- <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
            <form role="search" class="navbar-form-custom" action="search_results.html">
                
            </form>
        </div> -->
            <ul class="nav navbar-top-links navbar-right">
                <li>
                     <span class="m-r-sm text-muted welcome-message">SISUO (Sistem Informasi Ujian Online)</span>
                </li>
                <li>
                    <a href="login.php">
                        <i class="fa fa-sign-out"></i> Kembali Ke Halaman Login
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
                           	<h1><a href="#">SILAHKAN MENGISI FORMULIR DIBAWAH INI !</a></h1>
                            <div class="hr-line-dashed"></div>
                            <form class="form-horizontal" method="post" enctype="multipart/form-data">
                                <div class="form-group"><label class="col-sm-2 control-label">USERNAME</label>
                                    <div class="col-sm-10"><input type="text" class="form-control" name="username" maxlength="20" placeholder="Username" required></div>
                                </div>
                                
                                 <div class="form-group"><label class="col-sm-2 control-label">PASSWORD</label>
                                    <div class="col-sm-10"><input type="password" class="form-control" placeholder="Password" required="" id="password" title="8 Character Password. Use Uppercase, Lowercase and Numeric" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" name="password" maxlength="20"></div>
                                </div> 

                                <div class="form-group"><label class="col-sm-2 control-label">NAMA</label>
                                    <div class="col-sm-10"><input type="text" class="form-control" name="nama" placeholder="Nama" required></div>
                                </div>

                                <div class="form-group"><label class="col-sm-2 control-label">JENIS KELAMIN</label>
                                    <div class="col-sm-10"><select class="select2_demo_3 form-control" name="jenkel" required="">
                                        <option value="JENIS KELAMIN">-- PILIH JENIS KELAMIN --</option>
                                        <option value="LAKI-LAKI">LAKI-LAKI</option>
                                        <option value="PEREMPUAN">PEREMPUAN</option>
                                    </select></div>
                                </div> 

                                <div class="form-group"><label class="col-sm-2 control-label">TANGGAL LAHIR</label>
                                    <div class="col-sm-10"><input type="text" class="form-control tanggal" name="tanggal_lahir" required></div>
                                </div>

                                <div class="form-group"><label class="col-sm-2 control-label">Alamat</label>
                                    <div class="col-sm-10"><textarea class="form-control 1300" style="height:200px; text-transform: uppercase;" name="alamat" required></textarea></div>
                                </div>

                                <div class="form-group"><label class="col-sm-2 control-label">FOTO</label>
                                    <div class="col-sm-10"><input type="file" class="btn btn-primary" name="foto" required>* Foto Ukuran 4 x 6 dan Maksimal Ukuran File 3 MB</div>
                                </div>

                                <div class="form-group"><label class="col-sm-2 control-label">IJAZAH</label>
                                    <div class="col-sm-10"><input type="file" class="btn btn-primary" name="ijazah" required>* Scan Ijazah dan Maksimal Ukuran File 3 MB</div>
                                </div>

                                <div class="form-group"><label class="col-sm-2 control-label">ASAL SEKOLAH</label>
                                    <div class="col-sm-10"><input type="text" class="form-control" name="asal" placeholder="Asal Sekolah" required></div>
                                </div>

                                <div class="form-group"><label class="col-sm-2 control-label">NO. HP</label>
                                    <div class="col-sm-10"><input type="text" class="form-control" name="no_hp" placeholder="No. HP" required onkeypress="return hanyaAngka(event, false)" maxlength="12"></div>
                                </div>

                                <div class="form-group"><label class="col-sm-2 control-label">EMAIL</label>
                                    <div class="col-sm-10"><input type="email" class="form-control" name="email" placeholder="Email" required></div>
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
                                     $pass = $_POST['password'];
                                     $password = md5($_POST['password']);
                                     $encryptPassword= RC4::encrypt($key, $password);
                                     $nama = $_POST['nama'];
                                     $jenkel = $_POST['jenkel'];
                                     $tanggal_lahir = $_POST['tanggal_lahir'];
                                     $alamat = $_POST['alamat'];
                                     $foto =  $_FILES['foto']['name'];
                                     $ijazah =  $_FILES['ijazah']['name'];

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
                                     $asal = $_POST['asal'];
                                     $no_hp = $_POST['no_hp'];
                                     $email = $_POST['email'];
                                     
                                     //Membuat Nomer Peserta
                                     $tahun=date('Y');
                                     // $tahun=2019;
                                     // $sqlselect="SELECT TOP 1 no_peserta FROM t_peserta ORDER BY id_peserta DESC";
                                     $sqlselect="SELECT * FROM t_peserta order by id_peserta desc LIMIT 1";
                                     $result=mysqli_query($koneksi,$sqlselect);
                                     $row=mysqli_fetch_assoc($result);
                                     $jumlah=mysqli_num_rows($result);
                                     $no_peserta=$row['no_peserta'];
                                     $panjang=strlen($no_peserta);
                                     $potong1=substr($no_peserta, -4, 4);
                                     if($jumlah == 0){
                                        $nomer_soal="1$tahun";
                                     }else{
                                        if($potong1 != $tahun){
                                            $nomer_soal="1$tahun";
                                        }else{
                                            if($panjang == 5){
                                               $potong2=substr($no_peserta, 0, 1); 
                                            }else if($panjang == 6){
                                               $potong2=substr($no_peserta, 0, 2);    
                                            }else if($panjang == 7){
                                               $potong2=substr($no_peserta, 0, 3);
                                            }else{
                                               $potong2=substr($no_peserta, 0, 4);
                                            }
                                            $total=$potong2+1;
                                            $nomer_soal="$total$tahun";
                                        }
                                     }
                                     //simpan
                                     $simpan="INSERT INTO t_peserta
                                     VALUES
                                     (NULL,'$nomer_soal','$username','$password','$nama','$jenkel','$tanggal_lahir','$alamat','$foto','$ijazah','$asal','$no_hp','$email','$pass')";

                                     $resultSimpan=mysqli_query($koneksi,$simpan) or die (mysqli_error($koneksi));

                                     ?><script>
                                        alert("Berhasil Simpan, Silahkan Login !");
                                        window.location.href = 'login';
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
