<?php 
$db_koneksi=mysqli_connect("localhost","root","","ayam_geprek"); //konek ke database

function query($query){ 
	global $db_koneksi; 
	$result = mysqli_query($db_koneksi, $query); 

	while ($row = mysqli_fetch_assoc($result)) { 
		$rows[]=$row; 
	}
	return $rows; 
}//end 


function tambah($databahanbaku){
		global $db_koneksi;
		$namabahan=htmlspecialchars($databahanbaku["bahan"]);
		$jumlah=htmlspecialchars($databahanbaku["jumlah"]);
		$satuanhtmlspecialchars($databahanbaku["satuan"]);
		$harga=htmlspecialchars($databahanbaku["harga"]);
		
		$query="INSERT INTO bahan_baku VALUES 
				('$nis','$nama','$alamat','$jk','$agama','$kelas','$tahun_masuk')
		   	   ";
		mysqli_query($db_koneksi,$query);
		return mysqli_affected_rows($db_koneksi);
	}	
















 ?>