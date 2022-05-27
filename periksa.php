 <!-- Sweet Alert -->
 <link href="css/plugins/sweetalert/sweetalert.css" rel="stylesheet">
 <link href="css/animate.css" rel="stylesheet">
 <link href="css/style.css" rel="stylesheet">
 <script src="js/plugins/sweetalert/sweetalert.min.js"></script>

<?php
session_start();
#**************** koneksi ke mysql *****************#
include "koneksi.php";
include "RC4.php";
include "key.php";
#***************** akhir koneksi ******************#
if(isset($_POST['login'])) { 
 	$username = $_POST['username'];	
 	$password = md5($_POST['password']);
	$encryptPassword= RC4::encrypt($key, $password);
	$tampung = $_POST['password'];
	//waktu sekarang GMT+7
	$waktu=time()+25200;
	//waktu timeout (detik)
	$expired=600;
 	//cek username yang diketik oleh user sama tidak dengan username yang ada di database
 	// $sql = "SELECT * FROM t_akses WHERE username='$username' && password='$encryptPassword'";
	$sql = "SELECT * FROM t_akses WHERE username='$username' && password='$password'";
	$result = mysqli_query($koneksi,$sql);
	$row = mysqli_fetch_assoc($result);

	if (mysqli_num_rows($result) == 1) {
		// login benar //
		 $_SESSION['username'] = $username;
		 $_SESSION['password'] = $password;
		 $_SESSION['nip'] = $row['nip'];
		 $_SESSION['timeout']=$waktu+$expired;
		 ?><script language="javascript">
		 //swal("Success!","Anda berhasil login !","success");
		alert("anda behasil login");
		document.location='index'</script>
		<?php
		 }else{
		 // jika login salah //
		 ?><script language="javascript">
			//swal("Success!","Anda gagal login !","success");
			alert("anda gagal login");
			document.location='login'
			</script><?php
		 } 		
	}
?> 