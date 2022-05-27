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

     <!-- Data Tables -->
    <link href="css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="css/plugins/dataTables/dataTables.responsive.css" rel="stylesheet">
    <link href="css/plugins/dataTables/dataTables.tableTools.min.css" rel="stylesheet">


    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
 	<script language="JavaScript">
		function konfirmasi(kode_golongan) {
			tanya = confirm('Anda yakin ingin menghapus data ini  ?');
			if (tanya == true) return true;
			else return false;
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
                           	<h3><a href="#">LIST PESERTA</a></h3>
                            <div class="hr-line-dashed"></div>
                            <form class="form-horizontal" method="post">
                            <!-- <strong>KIRIM EMAIL : </strong> <input type="submit" class="btn btn-success" name="kirim" value="Kirim Email"> -->
                            </form>
                            <table class="table table-striped table-bordered table-hover " id="editable" >
						            <thead>
						            <tr>
						            	<th>No</th>
						                <th>No. Ujian</th>
						                <th>Nama Peserta</th>
                                        <th>Nilai Peserta</th>
						                <th>Status Peserta</th>
						            </tr>
						            </thead>
									<tbody>
						            <?php
						            	$no=1;

                                        // $sqlselect="SELECT * FROM t_soal WHERE id_jurusan='1'";
                                        // $result=mysqli_query($koneksi,$sqlselect)or die(mysqli_error($koneksi));
                                        // $jumlah=mysqli_num_rows($result);
						            	$sqlSelect2="SELECT * FROM t_peserta ";
						            	$result2=mysqli_query($koneksi,$sqlSelect2)or die(mysqli_error($koneksi));
						            	while($row=mysqli_fetch_array($result2)){
						            		echo"<tr>";
						            		echo"<td>$no</td>";
						            		echo"<td>$row[1]</td>";
                                            echo"<td>$row[4]</td>";
                                            $sqlSelect3="SELECT * FROM t_hasil_ujian WHERE no_peserta='$row[1]' and hasil='benar'";
                                            $result3=mysqli_query($koneksi,$sqlSelect3)or die(mysqli_error($koneksi));
                                            $jumlah3=mysqli_num_rows($result3);
                                            $nilai=($jumlah3/40)*100;
                                            if($nilai<=60){
                                            $status="Tidak Lulus";
                                            echo"<td><a class='label label-danger'>$nilai</a></td>";
                                            echo"<td><a class='label label-danger'>$status</a></td>";
                                            }else{
                                            $status="Lulus";
                                            echo"<td><a class='label label-success'>$nilai</a></td>";
                                            echo"<td><a class='label label-success'>$status</a></td>";
                                            }

						            		echo"</tr>";
						            		$no++;
						            	}
						            ?>
						           
						        </tbody>
						    </table>
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
 <!-- Data Tables -->
    <script src="js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="js/plugins/dataTables/dataTables.bootstrap.js"></script>
    <script src="js/plugins/dataTables/dataTables.responsive.js"></script>
    <script src="js/plugins/dataTables/dataTables.tableTools.min.js"></script>

<!-- Page-Level Scripts -->
    <script>
        $(document).ready(function() {
            $('.dataTables-example').DataTable({
                "dom": 'lTfigt',
                "tableTools": {
                    "sSwfPath": "js/plugins/dataTables/swf/copy_csv_xls_pdf.swf"
                }
            });

            /* Init DataTables */
            var oTable = $('#editable').DataTable();

            /* Apply the jEditable handlers to the table */
            oTable.$('td').editable( '../example_ajax.php', {
                "callback": function( sValue, y ) {
                    var aPos = oTable.fnGetPosition( this );
                    oTable.fnUpdate( sValue, aPos[0], aPos[1] );
                },
                "submitdata": function ( value, settings ) {
                    return {
                        "row_id": this.parentNode.getAttribute('id'),
                        "column": oTable.fnGetPosition( this )[2]
                    };
                },

                "width": "90%",
                "height": "100%"
            } );


        });

        function fnClickAddRow() {
            $('#editable').dataTable().fnAddData( [
                "Custom row",
                "New row",
                "New row",
                "New row",
                "New row" ] );

        }
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