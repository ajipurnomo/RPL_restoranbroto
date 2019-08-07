<?php 
 	include 'functions.php';
 	$hasil = mysqli_query($db_koneksi,"SELECT id_belanja FROM pembelian ORDER BY id_belanja DESC" );
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


if (isset($_POS["btn_simpan"])) {
	$kodebelanja = $_POS["kode"];
	mysqli_query($db_koneksi, "INSERT into pembelian VALUES('$kodebelanja','','','')" );
	echo "$kodebelanja";
}//end IF

 ?>


 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <form action="" method="post">
 <body>
 <center>
 	<input type="text" name="kode" value="<?php echo $formatbl; ?>" >
 	<button type="submit" name="btn_simpan">SIMPAN</button>
 </center>
 </body>
 </form>
 </html>
 


