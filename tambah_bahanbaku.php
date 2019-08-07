<?php 
require 'functions.php';
if (isset($_POST['submit'])){ //jika tombol submit dipencet
		$bahan = $_POST['bahan[]'];
		$jumlah = $_POST['jumlah[]'];
		$satuan = $_POST['satuan[]'];
		$harga = $_POST['harga[]'];

		$jumlah_dipilih = count($bahan,$jumlah,$satuan,$harga);
		for($x=0;$x<$jumlah_dipilih;$x++){
			mysql_query("INSERT INTO bahan_baku values('','','$bahan[$x]','$jumlah[$x]','$satuan[$x]','TERSEDIA')");
		}//end FOR
		mysqli_query($db_konek,"DELETE FROM makanan WHERE makanan=''"  ); //hapus baris yg teks makanannya kosong di DB

}//end IF
 

	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Tambah Bahan Baku</title>
</head>

<body>
<center>
	<h2>Masukkan Data Bahan Baku</h2>
	<form action="" method="post">
	<table border="0" cellpadding="5" cellspacing="5">
		<tr>
			<th>Nama Bahan</th>
			<th>Jumlah</th>
			<th>Satuan</th>
			<th>Harga (Rp)</th>
			<td>&emsp;&emsp;&emsp;&emsp;&emsp;<input type="submit" name="Tambah"></td>
		</tr>
		
		<tr>
			<td><input type="text" name="bahan[]"></td>
			<td><input type="text" name="jumlah[]" size="5"></td>
			<td><select name="satuan[]">
				<option>-pilih satuan-</option>
				<option>KG</option>
				<option>Gram</option>
				<option>Ikat</option>
				<option>Potong</option>
				</select>
			</td>
			<td><input type="text" name="harga[]" size="10"></td></td>
		</tr>
		<tr>
			<td><input type="text" name="bahan[]"></td>
			<td><input type="text" name="jumlah[]" size="5"></td>
			<td><select name="satuan[]">
				<option>-pilih satuan-</option>
				<option>KG</option>
				<option>Gram</option>
				<option>Ikat</option>
				<option>Potong</option>
				</select>
			</td>
			<td><input type="text" name="harga[]" size="10"></td></td>
		</tr>		
		<tr>
			<td><input type="text" name="bahan[]"></td>
			<td><input type="text" name="jumlah[]" size="5"></td>
			<td><select name="satuan[]">
				<option>-pilih satuan-</option>
				<option>KG</option>
				<option>Gram</option>
				<option>Ikat</option>
				<option>Potong</option>
				</select>
			</td>
			<td><input type="text" name="harga[]" size="10"></td></td>
		</tr>		
		<tr>
			<td><input type="text" name="bahan[]"></td>
			<td><input type="text" name="jumlah[]" size="5"></td>
			<td><select name="satuan[]">
				<option>-pilih satuan-</option>
				<option>KG</option>
				<option>Gram</option>
				<option>Ikat</option>
				<option>Potong</option>
				</select>
			</td>
			<td><input type="text" name="harga[]" size="10"></td></td>
		</tr>		
		<tr>
			<td><input type="text" name="bahan[]"></td>
			<td><input type="text" name="jumlah[]" size="5"></td>
			<td><select name="satuan[]">
				<option>-pilih satuan-</option>
				<option>KG</option>
				<option>Gram</option>
				<option>Ikat</option>
				<option>Potong</option>
				</select>
			</td>
			<td><input type="text" name="harga[]" size="10"></td></td>
		</tr>				
	</table>
</form>

<?php
//$warna = array("merah","hijau","biru","kuning");
//	foreach ($warna as $value) {
	//echo "$value <br>";
 //}
?> 


</center>
</body>
</html>
