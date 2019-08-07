<?php 
 	include 'functions.php';
 	$hasil = mysqli_query($db_koneksi,"SELECT id_belanja FROM pembelian" );
	$id_belanja = mysqli_fetch_array($hasil); //membidik data dan menampung ke dalam array
	$kode = $id_belanja['id_belanja']; //mengambil value data dari DB yg nama kolomnya id_belanja

	$urut = substr($kode, 2,3);
$tambah = (int) $urut + 1;

if(strlen($tambah) == 1){ //jika nomor urut satuan (1 digit)
	$formatbl = "BL"."00".$tambah;
}elseif (strlen($tambah) == 2) { //jika belasan atau puluhan (2 digit)
	$formatbl = "BL"."0".$tambah;
}else{
	$formatbl = "BL".$tambah;
}

if(strlen($tambah) == 1){ //jika nomor urut satuan (1 digit)
	$formatbh = "BH"."00".$tambah;
}elseif (strlen($tambah) == 2) { //jika belasan atau puluhan (2 digit)
	$formatbh = "BH"."0".$tambah;
}else{
	$formatbh = "BH".$tambah;
}


if (isset($_POST["btn_simpan"])) {
	$bahan = $_POST["namabahan"];
	$jumlah = $_POST["jumlah"];
	$satuan = $_POST["satuan"];
	$harga = $_POST["harga"];
	$tanggal = date('Y-m-d'); 

	

	//mysqli_query($db_koneksi, "INSERT INTO pembelian VALUES('$formatbl','','$tanggal','$harga')") ;

	$jumlah_dipilih = count($bahan);
for($x=0;  $x<$jumlah_dipilih;  $x++){ 
	//lakukan INSERT sebanyak jumlah variabel 
$sql =mysqli_query($db_koneksi, "INSERT INTO bahan_baku VALUES('$formatbh','','$bahan[$x]','$jumlah[$x]','$satuan[$x]','TERSEDIA')") ; 
$sql .= mysqli_query($db_koneksi, "INSERT INTO detail_belanja VALUES('','','$harga[$x]','$jumlah[$x]','')") ;
}//end FOR

//mysqli_query($db_koneksi,"DELETE FROM bahan_baku WHERE nama_bahan=''"  ); //hapus baris yg teks makanannya kosong di DB
mysqli_query($db_koneksi,"DELETE FROM detail_belanja WHERE harga_bahan=''"  ); //hapus baris yg teks makanannya kosong di DB

		

}//end IF

 ?>










 <!DOCTYPE html>
 <html>
 <head>
 	<title>Masukkan Data Belanja</title>
 </head>
 <body>
 	<form action="" method="post">
 		<center>
 	<table border="0" cellspacing="5" cellpadding="5">
 		
 		<tr>
 			<th>Nama Bahan</th>
 			<th>Jumlah</th>
 			<th>Satuan</th>
 			<th>Harga (Rp)</th>
 		</tr>
 		<tr>
			<td><input type="text" name="namabahan[]" size="25"></td>
			<td><div class="jumlah"><input type="text" name="jumlah[]" size="4"></div></td>
			<td><select name="satuan[]">
				<option value="Gram">Gram</option>
				<option value="KG">KG</option>
				<option value="Ikat">Ikat</option>
				<option value="Potong">Potong</option>
				</select></td>
			<td><input type="text" name="harga[]" size="10"></td>
 		</tr>
 		<tr>
 			<td><input type="text" name="namabahan[]" size="25"></td>
			<td><div class="jumlah"><input type="text" name="jumlah[]" size="4"></div></td>
			<td><select name="satuan[]">
				<option>Gram</option>
				<option>KG</option>
				<option>Ikat</option>
				<option>Potong</option>
				</select></td>
			<td><input type="text" name="harga[]" size="10"></td>			
  		</tr>
  		<tr>
 			<td><input type="text" name="namabahan[]" size="25"></td>
			<td><div class="jumlah"><input type="text" name="jumlah[]" size="4"></div></td>
			<td><select name="satuan[]">
				<option>Gram</option>
				<option>KG</option>
				<option>Ikat</option>
				<option>Potong</option>
				</select></td>
			<td><input type="text" name="harga[]" size="10"></td>			
  		</tr>
  		<tr>
 			<td><input type="text" name="namabahan[]" size="25"></td>
			<td><div class="jumlah"><input type="text" name="jumlah[]" size="4"></div></td>
			<td><select name="satuan[]">
				<option>Gram</option>
				<option>KG</option>
				<option>Ikat</option>
				<option>Potong</option>
				</select></td>
			<td><input type="text" name="harga[]" size="10"></td>			
  		</tr>
  		<tr>
 			<td><input type="text" name="namabahan[]" size="25"></td>
			<td><div class="jumlah"><input type="text" name="jumlah[]" size="4"></div></td>
			<td><select name="satuan[]">
				<option>Gram</option>
				<option>KG</option>
				<option>Ikat</option>
				<option>Potong</option>
				</select></td>
			<td><input type="text" name="harga[]" size="10"></td>			
  		</tr>
		
 	</table>
 	<button type="submit" name="btn_simpan">SIMPAN DATA</button>
 		</center>
 	</form>	
 </body>



 </style>
 </html>