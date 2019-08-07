<?php 
include 'functions.php';


if(isset($_POST["btn_masuk"])){
	$id = $_POST["input_id"];
	$pass = $_POST["input_password"];
	

    $result = mysqli_query($db_koneksi, "SELECT pegawai.id_pegawai, pegawai.password FROM pegawai WHERE 
			  pegawai.id_pegawai = '$id' AND pegawai.password='$pass' AND pegawai.jabatan = 'cs'
			  ");


    if(mysqli_num_rows($result) === 1){
    		header("Location:cs.php");
    }elseif(mysqli_num_rows($result) === 0){
    		echo "
    			<script>
    				alert ('ID pegawai dan Password anda SALAH atau Jabatan tidak sesuai');
					document.location.href='pelayanlogin.php';
    			</script>
    		";
    }



}//end Isset

?>

<!DOCTYPE html>
<html>
<head>
	<title>Login Pegawai</title>
	
</head>
<link rel="stylesheet" type="text/css" href="css/loginpegawai.css">
<body bgcolor="#7d7d7d">
	<div class="konten">
		<div class="header">
			<img class="gambar" src="gambar/lock.png">
			<h3 class="judul">Isi data login</h3>
		</div>
		<div class="formlogin">
			<form action="" method="post">
				<div class="grupform">
					<label for="id">ID Pegawai</label>
					<input type="text" name="input_id" required="">
				</div>
				<div class="grupform">
					<label for="pass">Password</label>
					<input type="Password" name="input_password" required="">
				</div>
				</div>
				<button type="submit" name="btn_masuk">MASUK</button>
			</form>
		</div>
	</div>
</body>

</html>

