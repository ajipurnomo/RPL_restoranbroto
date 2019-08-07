<?php 
require 'koneksi.php';
	$id= $_GET["id"];

	if(hapus($id) > 0){
		echo "
			<script>
				alert ('Kuisioner BERHASIL dihapus');
				document.location.href='cs.php'
			</script>
		";
	}else{
		echo "
			<script>
				alert ('Kuisioner GAGAL dihapus !');
				document.location.href='cs.php'
			</script>
		";
	}
?>