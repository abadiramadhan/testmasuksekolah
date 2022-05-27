<?php
session_start();
$waktu = 60;
include "../koneksi.php";
$select="SELECT * FROM t_log_soal_peserta WHERE no_peserta='$_SESSION[no_peserta]'";
$result=mysqli_query($koneksi,$select);
$row = mysqli_fetch_assoc($result);
if (mysqli_num_rows($result) == 1) {
?>
<script>
    alert("Anda sudah menyelesaikan Tes Penerimaan, Silahkan Lihat Hasil Anda. Terima Kasih.");
    window.close();
</script>

<?php
}else{
$lengkap=date('d/m/Y');
$hari=date('l');
$simpan="INSERT INTO t_log_soal_peserta
    VALUES
    (NULL,'$_SESSION[no_peserta]','$hari','$lengkap')";
$resultSimpan=mysqli_query($koneksi,$simpan) or die (mysqli_error($koneksi));

?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SISUO</title>

    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="../css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="../css/plugins/steps/jquery.steps.css" rel="stylesheet">
    <link href="../css/animate.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <!--Untuk Hitung Mundur-->
    <link rel="stylesheet" href="jquery.countdown.css">
    <style type="text/css">
    #hitmundur { width: 110px; height: 45px; }
    </style>
    <script src="jquery.min.js"></script>
    <script src="jquery.plugin.js"></script>
    <script src="jquery.countdown.js"></script>

</head>

<body>

    <div id="wrapper">

    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
               <li>
                    <a href="#"><i class="fa fa-edit"></i> <span class="nav-label">PENGISIAN SOAL</span></a>
                    </ul> 
                </li>                                                         
            </ul>
        </div>
    </nav>

        <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
        </nav>
        </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-content">
                           	<h1><a href="#">SILAHKAN MENGISI SOAL DIBAWAH INI !</a></h1>
                            <!-- <div class="hr-line-dashed"></div> -->
                        <div class="ibox-content">
                        <p>
                            Isilah soal-soal dibawah ini dengan benar !
                        </p>
                        <div id="hitmundur"></div><strong>*Waktu ujian yang harus ditempuh</strong><br>
                        <!-- <div id="tangkap"></div> -->
                         <form class="form-horizontal" method="post" enctype="multipart/form-data" id="myForm">
                         <div class="tabs-container">
                        <ul class="nav nav-tabs" hidden="">
                            <?php
                            $id_jurusan=$_GET['kode_jurusan'];
                            include "../koneksi.php";
                            $sqlSelect="select * from t_soal where id_jurusan=$id_jurusan";
                            $result=mysqli_query($koneksi,$sqlSelect)or die(mysqli_error($koneksi));
                            while($row=mysqli_fetch_array($result)){
                            if( $row[1] == 1){
                             echo "<li class='active'><a data-toggle='tab' href='#tab-$row[1]'> $row[1]</a></li>";
                            }else{
                            echo "<li class=''><a data-toggle='tab' href='#tab-$row[1]'> $row[1]</a></li>";
                            }
                            }
                            ?>
                        </ul>
                        <div class="tab-content">
                            <?php
                            $result=mysqli_query($koneksi,$sqlSelect)or die(mysqli_error($koneksi));
                             $jumlah=mysqli_num_rows($result);
                             while($row2=mysqli_fetch_array($result)){
                             if( $row2[1] == 1){
                              echo "<div id='tab-$row2[1]' class='tab-pane active'>
                                        <div class='panel-body'>
                                            <strong><h3>Soal Nomor $row2[1]</h3></strong><div class='hr-line-dashed'></div>
                                            <p><strong><h2>$row2[3]</h2></strong>
                                                <input type='radio' name='radio$row2[1]' id='r1$row2[1]' value='A'>&nbsp;<label for='radio3'> $row2[4]</label><br>
                                                <input type='radio' name='radio$row2[1]' id='r2$row2[1]' value='B'>&nbsp;<label for='radio3'> $row2[5]</label><br>
                                                <input type='radio' name='radio$row2[1]' id='r3$row2[1]' value='C'>&nbsp;<label for='radio3'> $row2[6]</label><br>
                                                <input type='radio' name='radio$row2[1]' id='r4$row2[1]' value='D'>&nbsp;<label for='radio3'> $row2[7]</label><br>
                                                <input type='radio' name='radio$row2[1]' id='r5$row2[1]' value='E'>&nbsp;<label for='radio3'> $row2[8]</label>
                                            </p>
                                            <a class='btn btn-primary btnNext' data-value='next$row2[1]'>Next</a>
                                </div>
                            </div>";
                            }else{
                            if($row2[1] == $jumlah){
                                echo "<div id='tab-$row2[1]' class='tab-pane'>
                                    <div class='panel-body'>
                                         <strong><h3>Soal Nomor $row2[1]</h3></strong><div class='hr-line-dashed'></div>
                                            <p><strong><h2>$row2[3]</h2></strong>
                                            <input type='radio' name='radio$row2[1]' id='r1$row2[1]' value='A'>&nbsp;<label for='radio3'> $row2[4]</label><br>
                                            <input type='radio' name='radio$row2[1]' id='r2$row2[1]' value='B'>&nbsp;<label for='radio3'> $row2[5]</label><br>
                                            <input type='radio' name='radio$row2[1]' id='r3$row2[1]' value='C'>&nbsp;<label for='radio3'> $row2[6]</label><br>
                                            <input type='radio' name='radio$row2[1]' id='r4$row2[1]' value='D'>&nbsp;<label for='radio3'> $row2[7]</label><br>
                                            <input type='radio' name='radio$row2[1]' id='r5$row2[1]' value='E'>&nbsp;<label for='radio3'> $row2[8]</label>
                                        </p>
                                        <a class='btn btn-primary btnPrevious'>Previous</a>
                                </div>
                            </div>";
                            }else{
                             echo "<div id='tab-$row2[1]' class='tab-pane'>
                                    <div class='panel-body'>
                                         <strong><h3>Soal Nomor $row2[1]</h3></strong><div class='hr-line-dashed'></div>
                                            <p><strong><h2>$row2[3]</h2></strong>
                                            <input type='radio' name='radio$row2[1]' id='r1$row2[1]' value='A'>&nbsp;<label for='radio3'> $row2[4]</label><br>
                                            <input type='radio' name='radio$row2[1]' id='r2$row2[1]' value='B'>&nbsp;<label for='radio3'> $row2[5]</label><br>
                                            <input type='radio' name='radio$row2[1]' id='r3$row2[1]' value='C'>&nbsp;<label for='radio3'> $row2[6]</label><br>
                                            <input type='radio' name='radio$row2[1]' id='r4$row2[1]' value='D'>&nbsp;<label for='radio3'> $row2[7]</label><br>
                                            <input type='radio' name='radio$row2[1]' id='r5$row2[1]' value='E'>&nbsp;<label for='radio3'> $row2[8]</label>
                                        </p>
                                        <a class='btn btn-primary btnPrevious'>Previous</a>
                                        <a class='btn btn-primary btnNext' data-value='next$row2[1]'>Next</a>
                                </div>
                            </div>";
                            }
                            }
                            }
                            ?>
                        </div><br>
                        
                         <div class="modal inmodal" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content animated bounceInRight">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <i class="fa fa-clock-o modal-icon"></i>
                                            <h4 class="modal-title">Waktu habis, silahkan pilih tombol finish untuk simpan.</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p><strong>Hasil dapat dilihat di menu nilai peserta.<br>Terima kasih telah mengikuti Ujian Online di SMK Negeri XYZ</strong></p>
                                            <?php
                                            // for($a=1;$a<=$jumlah;$a++){
                                            // echo "<input type='text' name='coba$a' id='coba$a' placeholder='coba$a'>";
                                            // }
                                            ?>
                                        </div>
                                        <div class="modal-footer">
                                             <!-- <input type="submit" class="btn btn-primary" name="simpan2" value="Simpan Nilai" id="simpan"> -->
                                            <!-- <button type="button" class="btn btn-primary" data-dismiss="modal">Simpan Nilai</button> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <input type="button"  onclick="SubmitFormData();" class="btn btn-warning" name="simpan" value="FINISH" id="simpan">
                    </div>
                    <!-- <div id="results"> -->
                    <?php
                     // if(isset($_POST['simpan'])) { 
                     //    for($x=1;$x<=$jumlah;$x++){
                     //     $jawab = $_POST['radio'.$x];
                     //     if($jawab==""){
                     //        $isi="kosong";
                     //     }else{
                     //        $isi=$jawab;
                     //     }
                     //    $sqlSelect2="select * from t_soal where id_jurusan=$id_jurusan and no_urut_soal=$x";
                     //    $result2=mysqli_query($koneksi,$sqlSelect2)or die(mysqli_error($koneksi));
                     //    $row3=mysqli_fetch_assoc($result2);
                     //    $simpan2="INSERT INTO t_hasil_ujian
                     //                 VALUES
                     //                 (NULL,'$_SESSION[no_peserta]','$row3[id_soal]','$isi')";

                     //                 $resultSimpan2=mysqli_query($koneksi,$simpan2) or die (mysqli_error($koneksi));
                     //    }
                     // }
                    ?>
                    </form>

                    </div>
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

        <script type="text/javascript">
        function waktuHabis(){
            $('#myModal').modal("show");
            // alert("Waktu anda habis!!!");
            // for(ulang=1;ulang<8;ulang++){
            //     var disini = "radio";
            //     var disana = "coba"; 
            //     var disinitambah =disini+""+ulang;
            //     var disanatambah =disana+""+ulang;
            //     var tes = $('input[name='+disinitambah+']:checked').val();
            //     document.getElementById(disanatambah).value=tes;
            // }
             // document.getElementById("coba").setAttribute('value','percobaan');
             $('.tab-content').hide();
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
        </script>
            <!-- Mainly scripts -->
    <!-- <script src="../js/jquery-2.1.1.js"></script> -->
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="../js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="../js/inspinia.js"></script>
    <script src="../js/plugins/pace/pace.min.js"></script>

    <!-- Steps -->
    <script src="../js/plugins/staps/jquery.steps.min.js"></script>
        <script type="text/javascript">
        $('.btnNext').click(function(event){
          $('.nav-tabs > .active').next('li').find('a').trigger('click');
          var coba1="r1";
          var coba2="r2";
          var coba3="r3";
          var coba4="r4";
          var coba5="r5";
          var tetap="next";
          var tangkap=$(this).data("value");
          var ulang;
          var count =  <?php echo $jumlah ?>;
          for(ulang=1;ulang<=count;ulang++){
            if(tetap+""+ulang===tangkap){
                var tes1=coba1+""+ulang;
                var tes2=coba2+""+ulang;
                var tes3=coba3+""+ulang;
                var tes4=coba4+""+ulang;
                var tes5=coba5+""+ulang;
                if (document.getElementById(tes1).checked){
                    // alert(document.getElementById('r1').value);
                }else if(document.getElementById(tes2).checked){
                    // alert(document.getElementById('r2').value);
                }else if(document.getElementById(tes3).checked){
                    // alert(document.getElementById('r3').value);
                }else if(document.getElementById(tes4).checked){
                    // alert(document.getElementById(tes4).value);
                }else if(document.getElementById(tes5).checked){
                    // alert(document.getElementById(tes5).value);
                }else{
                alert("Soal Sebelumnya. Masih belum terisi!");
                $('.nav-tabs > .active').prev('li').find('a').trigger('click');
            }
            }
          }
        });
        
        $('.btnPrevious').click(function(){
          $('.nav-tabs > .active').prev('li').find('a').trigger('click');
        });
    </script>

</body>

</html>
<script type="text/javascript">
    function SubmitFormData() {
            var potong;
            var count2 =  <?php echo $jumlah ?>;
            var id_jurusan =  <?php echo $id_jurusan ?>;
            var param;
            var ulang2;
            var lempar;
            var disini = "radio";
            var disana = "coba"; 
             for(ulang2=1;ulang2<=count2;ulang2++){
                var disinitambah =disini+""+ulang2;
                var tes = $('input[name='+disinitambah+']:checked').val();
                // alert(disinitambah);
            $.post("submit.php", {
            nama: tes, id_jurusan:id_jurusan,urut:ulang2
         },
            function(data) {
             $('#tangkap').html(data);
             $('#myForm')[0].reset();
            });
           
        }
        alert("Anda sudah menyelesaikan Tes Penerimaan, Silahkan pilih menu nilai untuk mengetahui nilai anda. Terima Kasih.");
        window.close();
    }
</script>

<?php
}
?>