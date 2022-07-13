<?php 
	include 'koneksi.php';

	if(isset($_GET['idb'])){
		$kategorii = mysqli_query($koneksi, "SELECT gambarbrand FROM brand WHERE id = '".$_GET['idb']."'");
		$k = mysqli_fetch_object($kategorii);

		unlink('./brand/'.$k -> gambarbrand);

		$delete =mysqli_query($koneksi, "DELETE FROM brand WHERE id ='".$_GET['idb']."' ");
		echo '<script>window.location="brand.php"</script>';
	}



 ?>