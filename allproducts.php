<?php 
  include'koneksi.php';
  error_reporting(0);
      $logo = mysqli_query($koneksi, "SELECT * FROM `content` WHERE id = 2;");
      $lg = mysqli_fetch_object($logo);

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
      <title> All Products | Togel Online Store Website</title>
      <link rel="stylesheet" href="css/style-allproducts.css" >
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <!-- menggunakan font awesome v6 -->
      <script src="https://kit.fontawesome.com/d07b1ba8d8.js" crossorigin="anonymous"></script>

    </head>
<body> 
   <!-- Bagian Header -->

   <div class="container">
     <div class="navbar">
        <div class="logo">
         
            <img src="konten/<?php echo $lg->logo ?>" width="380px">
        </div>
        <nav class="nav">
          <ul>
              <li><a href="index.php">Home</a></li>
              <li><a href="allproducts.php">Produk</a></li>
              <li><a href="tentangkami.php">Tentang Kami</a></li>
              <li><a href="akun.php">Akun</a></li>
          </ul>
        </nav>
    </div>
    
   </div>
<!-- Bagian Search -->
<div class="containerp">
    <div class="row row-1">
   <div class="search">
    <form class="search1" action="allproducts.php">
      <input type="text" name="search" class="searchTerm" placeholder="Cari gadget berkualitas anda disini........" value="<?php echo $_GET['search'] ?> ">
      <input type="hidden" name="kat" value="<?php echo $_GET['kat'] ?>">
      <button type="submit" name="cari" class="searchButton">
        <i class="fa fa-search"></i>
     </button>
    </form>
      

   </div>
   </div>
</div>


  <div class="small-container">
    
    <div class="row row-2">
      
      <h2>Semua Produk</h2>
      <select>
        <option>Default Sorting</option>
        <option>Harga Tertinggi</option>
        <option>Harga Terendah</option>
        <option>Brand Apple</option>
        <option>Brand Samsung</option>
        <option>Brand Xiaomi</option>
        <option>Brand Asus</option>
        <option>Brand Oppo</option>
      </select>
    </div>

    <div class="categories">
        <div class="row">
         <?php 
         if ($_GET['search'] != '' || $_GET['kat'] != '') {
            $where = "AND product_nama LIKE '%".$_GET['search']."%' AND kategori_id LIKE '%".$_GET['kat']."%' ";
          }

          $produk = mysqli_query($koneksi, "SELECT * FROM tabel_product WHERE product_status = 1 $where ORDER BY rand() ");
          if (mysqli_num_rows($produk) > 0) {
            while($p = mysqli_fetch_array($produk)){
         ?>
         <a href="detailproduk.php?id=<?php echo $p['product_id'] ?>">
          <div class="col-4">
            <img src="produk/<?php echo $p['product_image'] ?>" class=imgproduk >
            <p class="nama"><?php echo substr($p['product_nama'], 0,27) ?></p>
            <p class="harga">Rp. <?php echo number_format($p['product_price']) ?></p>
          </div>
          </a>
        <?php }}else { ?>
          <p>Produk Tidak Ada</p>
        <?php } ?>
        </div>
    </div>
    </div>


  <!-- Bagian Footer -->
  <div class="footer">
    <div class="container">
      <div class="row">
        <div class="footer-col-1">
          <h3>Kunjungi Alamat Toko Kami</h3>
          <p><?php echo $lg->alamat ?></p>
          <h4><?php echo $lg->haribuka ?></h4>
          <h4><?php echo $lg->jambuka ?> </h4>
        </div>
        <div class="footer-col-2">
          <img src="konten/<?php echo $lg->logo ?>">
          <p>Online Store Paling Terpercaya!</p>
        </div>

          <div class="footer-col-3">
          <h3>Social Media</h3>
          <ul>
            <li><a href="<?php echo $lg->facebook ?>" target="_blank"><i class="fa-brands fa-facebook"></i></a><a  href="<?php echo $lg->instagram ?>" target="_blank"><i class="fa-brands fa-instagram"></i></a><a  href="<?php echo $lg->youtube ?>" target="_blank"><i class="fa-brands fa-youtube"></i></a></li>
            <li></li>
            <li></li>
          </ul>
        </div>
      </div>
      <p class="copyright">Copyright 2022 - Softech Inc.</p>
    </div>
  </div>


</body>
</html>
