<?php 
include 'functions.php';


	if(isset($_POST["btn_masuk"])){
		$kode = $_POST["kodepembayaran"];

		$cekdata=mysqli_query($db_koneksi, "SELECT kode_pembayaran from pembayaran WHERE kode='$kode'");
		var_dump($cekdata);
	

         if(mysqli_num_rows($cekdata) === 1){
    		header("Location:home.php");
    		
			}elseif(mysqli_num_rows($cekdata) === 0){
 	  		echo "
    			<script>
    				alert ('Kode Pembayaran SALAH');
					document.location.href='pelanggan.php';
    			</script>
    		";
    	}//end IF

		

	}//end IF

 ?>


 <!DOCTYPE html>
 <html>
 <head>
 	<title>Pelanggan</title>
 </head>
 
 <body>
 	<div class="form">
 		<form action="" method="post">
 	<center>
 		<br><br><br>
 		<h3>Masukkan Kode Pembayaran Anda</h3><br>
 		
 		<input type="text" name="kodepembayaran"><br>
 		<button type="submit" name="btn_masuk">MASUK</button>
 		
 	</center>
 		</form>
 	</div>
 </body>


 <style type="text/css">
 	.form{
 		font-family: sans-serif;
 	}
 	input{
 		font-size: 20px;
 		text-align: center;

 	}

 </style>
 </html>