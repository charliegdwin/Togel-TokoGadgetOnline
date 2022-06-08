<?php 
	include 'koneksi.php';

	if(isset($_GET['idp'])){
		$produk = mysqli_query($koneksi, "SELECT product_image FROM tabel_product WHERE product_id = '".$_GET['idp']."'");
		$p = mysqli_fetch_object(produk);

		unlink('./produk/'.$p -> product_image);

		$delete = mysqli_query($koneksi, "DELETE FROM tabel_product WHERE product_id = '".$_GET['idp']."' ");
		echo '<script>window.location="product.php"</script>';
	}

 ?>