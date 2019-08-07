<?php 
include 'functions.php';
$datakuis = query("SELECT * FROM kuisioner");


if (isset($_POST["btn_hapus"])) { //jika tombol submit ditekan
  		$kuis = $_POST["isi_kuis"]; //ambil data inputan
  		 														//DARIMANA ?
  		mysqli_query($db_koneksi,"DELETE FROM kuisioner WHERE id_kuisioner = $id"  );	
		

}//end IF

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<form action="" method="post">
<body>
<br>	
	<br>
	<?php foreach ( $datakuis as $kolom ) :	?>

	<table border="0">
	<tr>
		<td valign="top"><?php echo $kolom["id_kuisioner"]; ?></td>
		<td><textarea readonly=""  name="isi_kuis[]" cols="40" rows="3"><?php echo $kolom["pertanyaan"]; ?></textarea></td>

		<td valign=top>
			     <a href="hapus.php?id= <?php echo $kolom["id_kuisioner"];?> 
			        "onclick="return confirm('Yakin Untuk Menghapus ?');">
			     <button type="submit" name="btn_hapus">HAPUS</button><br></td>
	</tr>		
	</table>	

	<?php endforeach; ?>
	
</body>
</form>


</html>



	
	