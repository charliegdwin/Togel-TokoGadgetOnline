<?php 
	include 'koneksi.php';

	if(isset($_GET['idk'])){
		$kategorii = mysqli_query($koneksi, "SELECT kategori_gambar FROM tabel_kategori WHERE kategori_id = '".$_GET['idk']."'");
		$k = mysqli_fetch_object($kategorii);

		unlink('./kategori/'.$k -> kategori_gambar);

		$delete =mysqli_query($koneksi, "DELETE FROM tabel_kategori WHERE kategori_id ='".$_GET['idk']."' ");
		echo '<script>window.location="kategori.php"</script>';
	}



 ?>