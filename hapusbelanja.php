<?php 
	include 'koneksi.php';

	if(isset($_GET['id'])){

		$delete = mysqli_query($koneksi, "DELETE FROM checkout WHERE id_checkout = '".$_GET['id']."' ");
		echo '<script>window.location="akun.php"</script>';
	}

 ?>