<?php 
	include 'koneksi.php';

	if(isset($_GET['idp'])){
		

		$delete = mysqli_query($koneksi, "DELETE FROM cart WHERE idcart = '".$_GET['idp']."' ");
		echo '<script>window.location="keranjang.php"</script>';
	}

 ?>