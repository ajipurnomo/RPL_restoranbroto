<?php 
	include 'functions.php';

	if (isset($_POST["btn_buat"])) { //jika tombol submit ditekan
  		$kuis = $_POST["input_kuis"]; //ambil data inputan
  		$jumlah_dipilih = count($kuis);  //menghitung jumlah variabel kuis


  		for($x=0;  $x<$jumlah_dipilih;  $x++){ 
		//lakukan INSERT sebanyak jumlah variabel kuis
			mysqli_query($db_koneksi,"INSERT INTO kuisioner values('','','$kuis[$x]')"  );	
		}//end FOR
		mysqli_query($db_koneksi,"DELETE FROM kuisioner WHERE pertanyaan=''"  ); //hapus baris yg teks makanannya kosong di DB

	//kita akan bikin ID yg auto increment berurutan secara normal setelah proses penghapusan baris di atas
	mysqli_query($db_koneksi,"ALTER TABLE kuisioner DROP id"); //hapus seluruh ID yg auto increment
	//bikin ulang ID yg auto increment
	mysqli_query($db_koneksi,"ALTER TABLE kuisioner ADD id INT NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST") ; 
  	}//end IF	

 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Buat Kuisioner</title>
 </head>
 <body>
 	<form action="" method="post">
 	<center>
 		<br>
 		<textarea name="input_kuis[]" cols="40" rows="3" required placeholder="pertanyaan 1"></textarea><br><br>

 		<textarea name="input_kuis[]" cols="40" rows="3" placeholder="pertanyaan 2" ></textarea><br><br>

 		<textarea name="input_kuis[]" cols="40" rows="3" placeholder="pertanyaan 3"></textarea><br><br>

 		<textarea name="input_kuis[]" cols="40" rows="3" placeholder="pertanyaan 4"></textarea><br><br>

 		<textarea name="input_kuis[]" cols="40" rows="3" placeholder="pertanyaan 5"></textarea><br><br>
	<button type="submit" name="btn_buat">BUAT KUISIONER</button>
 	</center>
 	</form>
 </body>
 </html>