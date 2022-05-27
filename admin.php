<form method="post">
username : <input type="text" name="user"><br><br>
password : <input type="text" name="pass" title="8 Character Password. Use Uppercase, Lowercase and Numeric" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"><br><br>
NIP : <select name="nip">
	<option value="" disabled="" selected="">-- Silahkan Pilih Hak Akses User Dengan NIP --</option>
	<option value="0"> ADMIN</option>
	<?php 
		include "koneksi.php";
		include "RC4.php";
		include "key.php";		
		$sqlselect="select nip from t_pegawai";
		$result=mysqli_query($koneksi,$sqlselect)or die(mysqli_error($koneksi));
		while($row=mysqli_fetch_assoc($result)){
			?>
			<option value="<?php echo $row['nip'] ?>"><?php echo $row['nip'] ?></option>
			<?php
		}
	 ?>
</select>
<!-- NIP : <input type="text" name="nip"> --><br><br>
<input type="submit" name="simpan">
<form>

<?php
if(isset($_POST['simpan'])){
	$username = $_POST['user'];
	$password = md5($_POST['pass']);
	$encryptPassword= RC4::encrypt($key, $password);
	$nip = $_POST['nip'];
	
	$sql = "INSERT INTO t_akses (username, password, nip)
VALUES ('$username', '$password', '$nip')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
}
?>
